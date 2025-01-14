<?php

namespace App\Livewire\Order\Form;

use App\Models\OrderUpdate;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class DeleteUpdate extends Component
{
    #[Locked]
    public $idOrderUpdate;
    #[Computed()]
    public function orderUpdate()
    {
        return OrderUpdate::find($this->idOrderUpdate);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->orderUpdate)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->orderUpdate->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('order-update-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(OrderUpdate $orderUpdate)
    {
        $this->idOrderUpdate = $orderUpdate->id;
    }
}
