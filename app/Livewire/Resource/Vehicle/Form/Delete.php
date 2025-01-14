<?php

namespace App\Livewire\Resource\Vehicle\Form;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idVehicle;
    #[Computed()]
    public function vehicle()
    {
        return Vehicle::find($this->idVehicle);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->vehicle)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->vehicle->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('vehicle-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(Vehicle $vehicle)
    {
        $this->idVehicle = $vehicle->id;
    }
}
