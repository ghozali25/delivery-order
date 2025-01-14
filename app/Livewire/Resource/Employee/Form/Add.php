<?php

namespace App\Livewire\Resource\Employee\Form;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
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
    protected function rules()
    {
        return [
            'id_role' => ['required', 'numeric', 'exists:App\Models\Role,id'],
            'ktp' => ['required', 'numeric', 'unique:App\Models\Employee,ktp'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:App\Models\User,email'],
            'phone' => ['required', 'numeric', 'unique:App\Models\Employee,phone'],
            'address' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = 'default';
        if (Auth::user()->cannot('create', Employee::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            $user = User::create($validatedData);
            $validatedData['id_user'] = $user->id;
            $employee = Employee::create($validatedData);
            if (!$user || !$employee) {
                $employee ? $employee->delete : null;
                $user ? $user->delete : null;
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('employee-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->id_role = null;
        $this->ktp = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount()
    {
        $this->resetForm();
    }
}
