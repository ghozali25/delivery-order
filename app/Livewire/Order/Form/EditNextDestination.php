<?php

namespace App\Livewire\Order\Form;

use App\Models\DeliveryCost;
use App\Models\Order;
use App\Models\OrderNextDestination;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditNextDestination extends Component
{
    #[Locked]
    public $idOrderNextDestination;
    #[Computed()]
    public function orderNextDestination()
    {
        return OrderNextDestination::find($this->idOrderNextDestination);
    }
    #[Computed()]
    public function order()
    {
        return Order::with('vehicle')->find($this->orderNextDestination->id_order);
    }

    public $id_destination_area;
    protected function rules()
    {
        return [
            'id_destination_area' => ['required', 'numeric', 'exists:App\Models\DestinationArea,id'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['cost'] = DeliveryCost::where('id_destination_area', $validatedData['id_destination_area'])
            ->where('id_vehicle_type', $this->order->vehicle->id_vehicle_type)
            ->first()
            ->cost_second;
        if (Auth::user()->cannot('update', $this->orderNextDestination)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->orderNextDestination->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('order-next-destination-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->id_destination_area = $this->orderNextDestination->id_destination_area;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(OrderNextDestination $orderNextDestination)
    {
        $this->idOrderNextDestination = $orderNextDestination->id;
        $this->resetForm();
    }
}
