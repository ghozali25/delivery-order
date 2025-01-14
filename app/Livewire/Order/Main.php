<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $pageTitle = 'Pengiriman';
    #[Computed()]
    public function orders()
    {
        return Order::with([
            'client',
            'employee',
            'driver',
            'vehicle.vehicle_type',
            'destination_area',
            'orders_next_destinations.destination_area',
        ])
            ->leftJoin('clients', 'clients.id', '=', 'orders.id_client')
            ->leftJoin('employees', 'employees.id', '=', 'orders.id_employee')
            ->leftJoin('drivers', 'drivers.id', '=', 'orders.id_driver')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'orders.id_vehicle')
            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'vehicles.id_vehicle_type')
            ->leftJoin('destination_areas', 'destination_areas.id', '=', 'orders.id_destination_area')
            ->select('orders.*')
            ->when($this->authenticatedUser->role->abbreviation === 'CLN', function ($query) {
                $query->where('id_client', $this->authenticatedUser->client->id);
            })
            ->when($this->filterSearch != null, function ($query) {
                $filterSearch = str_replace(' ', '%', $this->filterSearch);
                $query->where('orders.id', 'like', '%' . $filterSearch . '%')
                    ->orWhereHas('client', function ($query) use ($filterSearch) {
                        $query->where('name', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhereHas('employee', function ($query) use ($filterSearch) {
                        $query->where('name', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhereHas('driver', function ($query) use ($filterSearch) {
                        $query->where('name', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhereHas('vehicle', function ($query) use ($filterSearch) {
                        $query->where('plate', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhereHas('vehicle.vehicle_type', function ($query) use ($filterSearch) {
                        $query->where('name', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhere('cargo_name', 'like', '%' . $filterSearch . '%')
                    ->orWhere('recipient_address', 'like', '%' . $filterSearch . '%')
                    ->orWhereHas('destination_area', function ($query) use ($filterSearch) {
                        $query->where('name', 'like', '%' . $filterSearch . '%');
                    });
            })
            ->orderBy($this->filterSortBy, $this->filterSortDesc ? 'desc' : 'asc')
            ->paginate($this->filterPaginate);
    }
    #[Computed()]
    public function authenticatedUser()
    {
        return User::with('role')->find(Auth::id());
    }

    public $filterSortBy = 'datetime_ordered';
    public $filterSortDesc = false;
    public $filterPaginate = 25;
    public $filterSearch;
    public function updateFilterSort($column)
    {
        if ($column === $this->filterSortBy) {
            $this->filterSortDesc = !$this->filterSortDesc;
        } else {
            $this->filterSortBy = $column;
            $this->filterSortDesc = false;
        }
    }

    public function updated($property, $value)
    {
        if ($property === 'filterSearch') $this->resetPage();
    }
    #[On('order-updated')]
    #[Layout('app')]
    public function render()
    {
        return view('livewire.order.main');
    }
}
