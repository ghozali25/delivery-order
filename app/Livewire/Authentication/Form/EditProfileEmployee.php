<?php

namespace App\Livewire\Authentication\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditProfileEmployee extends Component
{
    #[Computed()]
    public function authenticatedUser()
    {
        return User::with('employee')->find(Auth::id());
    }
    #[Computed()]
    public function authenticatedEmployee()
    {
        return $this->authenticatedUser->employee;
    }

    public $ktp;
    public $name;
    public $email;
    public $phone;
    public $address;
    protected function rules()
    {
        return [
            'ktp' => ['required', 'numeric', 'unique:App\Models\Employee,ktp,' . $this->authenticatedEmployee->id],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:App\Models\User,email,' . Auth::id()],
            'phone' => ['required', 'numeric', 'unique:App\Models\Client,phone,' . $this->authenticatedEmployee->id],
            'address' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $user = $this->authenticatedUser->update($validatedData);
        $employee = $this->authenticatedEmployee->update($validatedData);
        if (!$user || !$employee) {
            Toaster::error('Data gagal diubah.');
        } else {
            $this->dispatch('user-updated');
            Toaster::success('Data berhasil diubah.');
        }
    }
    public function resetForm()
    {
        $this->ktp = $this->authenticatedEmployee->ktp;
        $this->name = $this->authenticatedEmployee->name;
        $this->email = $this->authenticatedUser->email;
        $this->phone = $this->authenticatedEmployee->phone;
        $this->address = $this->authenticatedEmployee->address;
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
