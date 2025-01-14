<?php

namespace App\Livewire\Order\Print;

use App\Models\Client;
use App\Models\CompanyProfile;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

class OrderReceipt extends Component
{
    #[Locked]
    public $idClient;
    #[Computed()]
    public function client()
    {
        return Client::find($this->idClient);
    }
    #[Computed()]
    public function orders()
    {
        return Order::with([
            'client',
            'employee',
            'driver',
            'vehicle.vehicle_type',
            'destination_area',
            'orders_updates',
            'orders_next_destinations.destination_area',
        ])
            ->where('id_client', $this->idClient)
            ->when($this->filterFromDate, function ($query) {
                $query->whereDate('datetime_closed', '>=', $this->filterFromDate);
            })
            ->when($this->filterToDate, function ($query) {
                $query->whereDate('datetime_closed', '<=', $this->filterToDate);
            })
            ->orderBy('datetime_ordered')
            ->get();
    }
    #[Computed()]
    public function totalCost()
    {
        return $this->orders->sum('total_cost');
    }
    #[Computed()]
    public function companyProfile()
    {
        return CompanyProfile::first();
    }

    public $filterFromDate;
    public $filterToDate;
    public function resetFilter()
    {
        $this->filterFromDate = Carbon::now()->startOfMonth()->isoFormat('YYYY-MM-DD');
        $this->filterToDate = Carbon::now()->endOfMonth()->isoFormat('YYYY-MM-DD');
    }

    public function mount(Client $client)
    {
        $this->idClient = $client->id;
        $this->resetFilter();
    }
    #[Layout('print')]
    public function render()
    {
        return view('livewire.order.print.order-receipt');
    }
}
