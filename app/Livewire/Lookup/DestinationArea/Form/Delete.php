<?php

namespace App\Livewire\Lookup\DestinationArea\Form;

use App\Models\DestinationArea;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idDestinationArea;
    #[Computed()]
    public function destinationArea()
    {
        return DestinationArea::find($this->idDestinationArea);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->destinationArea)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->destinationArea->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('destination-area-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(DestinationArea $destinationArea)
    {
        $this->idDestinationArea = $destinationArea->id;
    }
}
