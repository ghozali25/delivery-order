<?php

namespace App\Livewire\Resource\Vehicle\Form;

use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idVehicle;
    #[Computed()]
    public function vehicle()
    {
        return Vehicle::find($this->idVehicle);
    }
    #[Computed()]
    public function vehicleTypes()
    {
        return VehicleType::orderBy('name')->get();
    }

    public $plate;
    public $id_vehicle_type;
    public $brand;
    public $model;
    public $color;
    protected function rules()
    {
        return [
            'plate' => ['required', 'string', 'unique:App\Models\Vehicle,plate,' . $this->idVehicle],
            'id_vehicle_type' => ['required', 'numeric', 'exists:App\Models\VehicleType,id'],
            'brand' => ['nullable', 'string'],
            'model' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->vehicle)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->vehicle->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('vehicle-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->plate = $this->vehicle->plate;
        $this->id_vehicle_type = $this->vehicle->id_vehicle_type;
        $this->brand = $this->vehicle->brand;
        $this->model = $this->vehicle->model;
        $this->color = $this->vehicle->color;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Vehicle $vehicle)
    {
        $this->idVehicle = $vehicle->id;
        $this->resetForm();
    }
}
