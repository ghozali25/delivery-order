<?php

namespace App\Livewire\Business\DeliveryCost\Form;

use App\Models\DeliveryCost;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idDeliveryCost;
    #[Computed()]
    public function deliveryCost()
    {
        return DeliveryCost::find($this->idDeliveryCost);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->deliveryCost)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->deliveryCost->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('delivery-cost-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(DeliveryCost $deliveryCost)
    {
        $this->idDeliveryCost = $deliveryCost->id;
    }
}
