<?php

namespace App\Livewire\Business\DeliveryCost;

use App\Models\DeliveryCost;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $pageTitle = 'Biaya Sewa';
    #[Computed()]
    public function deliveryCosts()
    {
        return DeliveryCost::with(['destination_area', 'vehicle_type'])
            ->leftJoin('destination_areas', 'destination_areas.id', '=', 'delivery_costs.id_destination_area')
            ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'delivery_costs.id_vehicle_type')
            ->select('delivery_costs.*')
            ->when($this->filterSearch != null, function ($query) {
                $filterSearch = str_replace(' ', '%', $this->filterSearch);
                $query
                    ->whereHas('destination_area', function ($query) use ($filterSearch) {
                        $query->where('abbreviation', 'like', '%' . $filterSearch . '%')
                            ->orWhere('name', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhereHas('vehicle_type', function ($query) use ($filterSearch) {
                        $query->where('abbreviation', 'like', '%' . $filterSearch . '%')
                            ->orWhere('name', 'like', '%' . $filterSearch . '%');
                    });
            })
            ->orderBy($this->filterSortBy, $this->filterSortDesc ? 'desc' : 'asc')
            ->paginate($this->filterPaginate);
    }

    public $filterSortBy = 'destination_areas.name';
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
    #[On('delivery-cost-updated')]
    #[Layout('app')]
    public function render()
    {
        return view('livewire.business.delivery-cost.main');
    }
}
