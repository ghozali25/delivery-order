<?php

namespace App\Livewire\Order\Form;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idOrder;
    #[Computed()]
    public function order()
    {
        return Order::find($this->idOrder);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->order)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->order->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('order-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(Order $order)
    {
        $this->idOrder = $order->id;
    }
}
