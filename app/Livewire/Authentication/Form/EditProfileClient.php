<?php

namespace App\Livewire\Authentication\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditProfileClient extends Component
{
    #[Computed()]
    public function authenticatedUser()
    {
        return User::with('client')->find(Auth::id());
    }
    #[Computed()]
    public function authenticatedClient()
    {
        return $this->authenticatedUser->client;
    }

    public $name;
    public $email;
    public $phone;
    public $address;
    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:App\Models\User,email,' . Auth::id()],
            'phone' => ['required', 'numeric', 'unique:App\Models\Client,phone,' . $this->authenticatedClient->id],
            'address' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $user = $this->authenticatedUser->update($validatedData);
        $client = $this->authenticatedClient->update($validatedData);
        if (!$user || !$client) {
            Toaster::error('Data gagal diubah.');
        } else {
            $this->dispatch('user-updated');
            Toaster::success('Data berhasil diubah.');
        }
    }
    public function resetForm()
    {
        $this->name = $this->authenticatedClient->name;
        $this->email = $this->authenticatedUser->email;
        $this->phone = $this->authenticatedClient->phone;
        $this->address = $this->authenticatedClient->address;
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
