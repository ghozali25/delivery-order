<?php

namespace App\Livewire\Lookup\VehicleType\Form;

use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
    public $abbreviation;
    public $name;
    public $max_cargo_weight_kg;
    protected function rules()
    {
        return [
            'abbreviation' => ['nullable', 'string', 'unique:App\Models\VehicleType,abbreviation'],
            'name' => ['required', 'string', 'unique:App\Models\VehicleType,name'],
            'max_cargo_weight_kg' => ['required', 'numeric'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('create', VehicleType::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!VehicleType::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('vehicle-type-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->abbreviation = null;
        $this->name = null;
        $this->max_cargo_weight_kg = null;
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
