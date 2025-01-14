<?php

namespace App\Livewire\Resource\Vehicle\Form;

use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
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
            'plate' => ['required', 'string', 'unique:App\Models\Vehicle,plate'],
            'id_vehicle_type' => ['required', 'numeric', 'exists:App\Models\VehicleType,id'],
            'brand' => ['nullable', 'string'],
            'model' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('create', Vehicle::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!Vehicle::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('vehicle-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->plate = null;
        $this->id_vehicle_type = null;
        $this->brand = null;
        $this->model = null;
        $this->color = null;
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
