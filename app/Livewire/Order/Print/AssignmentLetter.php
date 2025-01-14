<?php

namespace App\Livewire\Order\Print;

use App\Models\CompanyProfile;
use App\Models\Order;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class AssignmentLetter extends Component
{
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
            'orders_updates',
            'orders_next_destinations.destination_area',
        ])->find($this->idOrder);
    }
    #[Computed()]
    public function companyProfile()
    {
        return CompanyProfile::first();
    }

    public function mount(Order $order)
    {
        $this->idOrder = $order->id;
    }
    #[Layout('print')]
    public function render()
    {
        return view('livewire.order.print.assignment-letter');
    }
}
