<?php

namespace App\Livewire\Business\Client\Form;

use App\Models\Client;
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
    public $idClient;
    #[Computed()]
    public function client()
    {
        return Client::with('user')->find($this->idClient);
    }
    #[Computed()]
    public function user()
    {
        return $this->client->user;
    }

    public $name;
    public $email;
    public $phone;
    public $address;
    public $is_active;
    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:App\Models\User,email,' . $this->user->id],
            'phone' => ['required', 'numeric', 'unique:App\Models\Client,phone,' . $this->idClient],
            'address' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['datetime_inactive'] = $validatedData['is_active'] ? null : Carbon::now();
        if (Auth::user()->cannot('update', $this->client)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            $user = $this->user->update($validatedData);
            $client = $this->client->update($validatedData);
            if (!$user || !$client) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('client-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->name = $this->client->name;
        $this->email = $this->user->email;
        $this->phone = $this->client->phone;
        $this->address = $this->client->address;
        $this->is_active = $this->client->datetime_inactive ? false : true;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Client $client)
    {
        $this->idClient = $client->id;
        $this->resetForm();
    }
}
