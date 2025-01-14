<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
    public $pageTitle = 'Detail Pengiriman';
    #[Locked]
    public $idOrder;
    #[Computed()]
    public function order()
    {
        return Order::with([
            'client',
            'employee',
            'driver',
            'vehicle.vehicle_type',
            'destination_area',
            'orders_next_destinations.destination_area',
            'orders_updates' => function ($query) {
                $query->orderBy('datetime_updated', 'desc');
            },
        ])->find($this->idOrder);
    }

    public function mount(Order $order)
    {
        $this->idOrder = $order->id;
    }
    #[On('order-updated')]
    #[Layout('app')]
    public function render()
    {
        return view('livewire.order.detail');
    }
}
