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

class AddNextDestination extends Component
{
    #[Locked]
    public $idOrder;
    #[Computed()]
    public function order()
    {
        return Order::with('vehicle')->find($this->id_order);
    }

    public $id_destination_area;
    protected function rules()
    {
        return [
            'id_destination_area' => ['nullable', 'numeric', 'exists:App\Models\DestinationArea,id'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['id_order'] = $this->idOrder;
        $validatedData['cost'] = DeliveryCost::where('id_destination_area', $validatedData['id_destination_area'])
            ->where('id_vehicle_type', $this->order->vehicle->id_vehicle_type)
            ->first()
            ->cost_second;
        if (Auth::user()->cannot('create', OrderNextDestination::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!OrderNextDestination::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('order-next-destination-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->id_destination_area = null;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Order $order)
    {
        $this->idOrder = $order->id;
        $this->resetForm();
    }
}
