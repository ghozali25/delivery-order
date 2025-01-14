<?php

namespace App\Livewire\Business\DeliveryCost\Form;

use App\Models\DeliveryCost;
use App\Models\DestinationArea;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idDeliveryCost;
    #[Computed()]
    public function deliveryCost()
    {
        return DeliveryCost::find($this->idDeliveryCost);
    }
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
        if (Auth::user()->cannot('update', $this->deliveryCost)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->deliveryCost->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('delivery-cost-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->id_destination_area = $this->deliveryCost->id_destination_area;
        $this->id_vehicle_type = $this->deliveryCost->id_vehicle_type;
        $this->cost_first = $this->deliveryCost->cost_first;
        $this->cost_second = $this->deliveryCost->cost_second;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(DeliveryCost $deliveryCost)
    {
        $this->idDeliveryCost = $deliveryCost->id;
        $this->resetForm();
    }
}
