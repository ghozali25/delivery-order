<?php

namespace App\Livewire\Lookup\VehicleType\Form;

use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idVehicleType;
    #[Computed()]
    public function vehicleType()
    {
        return VehicleType::find($this->idVehicleType);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->vehicleType)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->vehicleType->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('vehicle-type-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(VehicleType $vehicleType) {
        $this->idVehicleType = $vehicleType->id;
    }
}
