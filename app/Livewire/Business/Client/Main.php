<?php

namespace App\Livewire\Business\Client;

use App\Models\Client;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $pageTitle = 'Mitra';
    #[Computed()]
    public function clients()
    {
        return Client::with('user')
            ->leftJoin('users', 'users.id', '=', 'clients.id_user')
            ->select('clients.*')
            ->when($this->filterSearch != null, function ($query) {
                $filterSearch = str_replace(' ', '%', $this->filterSearch);
                $query->where('name', 'like', '%' . $filterSearch . '%')
                    ->orWhereHas('user', function ($query) use ($filterSearch) {
                        $query->where('email', 'like', '%' . $filterSearch . '%');
                    })
                    ->orWhere('phone', 'like', '%' . $filterSearch . '%')
                    ->orWhere('address', 'like', '%' . $filterSearch . '%');
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
    #[On('client-updated')]
    #[Layout('app')]
    public function render()
    {
        return view('livewire.business.client.main');
    }
}
