<?php

namespace App\Livewire\Resource\Employee\Form;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idEmployee;
    #[Computed()]
    public function employee()
    {
        return Employee::with('user')->find($this->idEmployee);
    }
    #[Computed()]
    public function user()
    {
        return $this->employee->user;
    }
    #[Computed()]
    public function roles()
    {
        return Role::orderBy('name')->get();
    }

    public $id_role;
    public $ktp;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $is_active;
    protected function rules()
    {
        return [
            'id_role' => ['required', 'numeric', 'exists:App\Models\Role,id'],
            'ktp' => ['required', 'numeric', 'unique:App\Models\Employee,ktp,' . $this->idEmployee],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:App\Models\User,email,' . $this->user->id],
            'phone' => ['required', 'numeric', 'unique:App\Models\Employee,phone,' . $this->idEmployee],
            'address' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['datetime_inactive'] = $validatedData['is_active'] ? null : Carbon::now();
        if (Auth::user()->cannot('update', $this->employee)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            $user = $this->user->update($validatedData);
            $employee = $this->employee->update($validatedData);
            if (!$user || !$employee) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('employee-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->id_role = $this->employee->id_role;
        $this->ktp = $this->employee->ktp;
        $this->name = $this->employee->name;
        $this->email = $this->employee->user->email;
        $this->phone = $this->employee->phone;
        $this->address = $this->employee->address;
        $this->is_active = $this->employee->datetime_inactive ? false : true;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Employee $employee)
    {
        $this->idEmployee = $employee->id;
        $this->resetForm();
    }
}
