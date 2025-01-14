<?php

namespace App\Livewire\Business\DeliveryCost\Form;

use App\Models\DeliveryCost;
use App\Models\DestinationArea;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
    #[Computed()]
    public function destinationAreas()
    {
        return DestinationArea::orderBy('name')->get();
    }
    #[Computed()]
    public function vehicleTypes()
    {
        return VehicleType::orderBy('name')->get();
    }

    public $id_destination_area;
    public $id_vehicle_type;
    public $cost_first;
    public $cost_second;
    protected function rules()
    {
        return [
            'id_destination_area' => ['required', 'numeric', 'exists:App\Models\DestinationArea,id'],
            'id_vehicle_type' => ['required', 'numeric', 'exists:App\Models\VehicleType,id'],
            'cost_first' => ['required', 'numeric'],
            'cost_second' => ['required', 'numeric'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('create', DeliveryCost::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!DeliveryCost::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('delivery-cost-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->id_destination_area = null;
        $this->id_vehicle_type = null;
        $this->cost_first = null;
        $this->cost_second = null;
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
