<?php

namespace App\Livewire\Business\Client\Form;

use App\Models\Client;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:App\Models\User,email'],
            'phone' => ['required', 'numeric', 'unique:App\Models\Client,phone'],
            'address' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['id_role'] = Role::firstWhere('abbreviation', 'CLN')->id;
        $validatedData['password'] = 'default';
        if (Auth::user()->cannot('create', Client::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            $user = User::create($validatedData);
            $validatedData['id_user'] = $user->id;
            $client = Client::create($validatedData);
            if (!$user || !$client) {
                $client ? $client->delete : null;
                $user ? $user->delete : null;
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('client-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
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
