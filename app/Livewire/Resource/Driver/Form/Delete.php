<?php

namespace App\Livewire\Resource\Driver\Form;

use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idDriver;
    #[Computed()]
    public function driver()
    {
        return Driver::find($this->idDriver);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->driver)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->driver->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('driver-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(Driver $driver)
    {
        $this->idDriver = $driver->id;
    }
}
