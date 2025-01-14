<?php

namespace App\Livewire\Lookup\VehicleType;

use App\Models\VehicleType;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $pageTitle = 'Jenis Kendaraan';
    #[Computed()]
    public function vehicleTypes()
    {
        return VehicleType::when($this->filterSearch != null, function ($query) {
            $filterSearch = str_replace(' ', '%', $this->filterSearch);
            $query->where('abbreviation', 'like', '%' . $filterSearch . '%')
                ->orWhere('name', 'like', '%' . $filterSearch . '%');
        })
            ->orderBy($this->filterSortBy, $this->filterSortDesc ? 'desc' : 'asc')
            ->paginate($this->filterPaginate);
    }

    public $filterSortBy = 'name';
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
    #[On('vehicle-type-updated')]
    #[Layout('app')]
    public function render()
    {
        return view('livewire.lookup.vehicle-type.main');
    }
}
