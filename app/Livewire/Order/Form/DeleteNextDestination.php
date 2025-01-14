<?php

namespace App\Livewire\Order\Form;

use App\Models\OrderNextDestination;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class DeleteNextDestination extends Component
{
    #[Locked]
    public $idOrderNextDestination;
    #[Computed()]
    public function orderNextDestination()
    {
        return OrderNextDestination::find($this->idOrderNextDestination);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->orderNextDestination)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->orderNextDestination->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('order-next-destination-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(OrderNextDestination $orderNextDestination)
    {
        $this->idOrderNextDestination = $orderNextDestination->id;
    }
}
