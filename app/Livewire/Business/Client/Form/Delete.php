<?php

namespace App\Livewire\Business\Client\Form;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idClient;
    #[Computed()]
    public function client()
    {
        return Client::with('user')->find($this->idClient);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->client)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            $user = $this->client->user->delete();
            $client = $this->client->delete();
            if (!$user || !$client) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('client-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(Client $client)
    {
        $this->idClient = $client->id;
    }
}
