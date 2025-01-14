<?php

namespace App\Livewire\Lookup\VehicleType\Form;

use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idVehicleType;
    #[Computed()]
    public function vehicleType()
    {
        return VehicleType::find($this->idVehicleType);
    }

    public $abbreviation;
    public $name;
    public $max_cargo_weight_kg;
    protected function rules()
    {
        return [
            'abbreviation' => ['nullable', 'string', 'unique:App\Models\VehicleType,abbreviation,' . $this->idVehicleType],
            'name' => ['required', 'string', 'unique:App\Models\VehicleType,name,' . $this->idVehicleType],
            'max_cargo_weight_kg' => ['required', 'numeric'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->vehicleType)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->vehicleType->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('vehicle-type-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->abbreviation = $this->vehicleType->abbreviation;
        $this->name = $this->vehicleType->name;
        $this->max_cargo_weight_kg = $this->vehicleType->max_cargo_weight_kg;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(VehicleType $vehicleType)
    {
        $this->idVehicleType = $vehicleType->id;
        $this->resetForm();
    }
}
