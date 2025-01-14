<?php

namespace App\Livewire\Resource\Vehicle;

use App\Models\Vehicle;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $pageTitle = 'Kendaraan';
    #[Computed()]
    public function vehicles()
    {
        return Vehicle::with('vehicle_type')
            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'vehicles.id_vehicle_type')
            ->select('vehicles.*')
            ->when($this->filterSearch != null, function ($query) {
                $filterSearch = str_replace(' ', '%', $this->filterSearch);
                $query->where('plate', 'like', '%' . $filterSearch . '%')
                    ->orWhereHas('vehicle_type', function ($query) use ($filterSearch) {
                        $query->where('abbreviation', 'like', '%' . $filterSearch . '%')
                            ->orWhere('name', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhere('brand', 'like', '%' . $filterSearch . '%')
                    ->orWhere('model', 'like', '%' . $filterSearch . '%')
                    ->orWhere('color', 'like', '%' . $filterSearch . '%');
            })
            ->orderBy($this->filterSortBy, $this->filterSortDesc ? 'desc' : 'asc')
            ->paginate($this->filterPaginate);
    }

    public $filterSortBy = 'plate';
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
    #[On('vehicle-updated')]
    #[Layout('app')]
    public function render()
    {
        return view('livewire.resource.vehicle.main');
    }
}
