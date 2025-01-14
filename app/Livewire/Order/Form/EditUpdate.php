<?php

namespace App\Livewire\Order\Form;

use App\Models\OrderUpdate;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditUpdate extends Component
{
    #[Locked]
    public $idOrderUpdate;
    #[Computed()]
    public function orderUpdate()
    {
        return OrderUpdate::find($this->idOrderUpdate);
    }

    public $datetime_updated;
    public $note;
    public $cost;
    protected function rules()
    {
        return [
            'datetime_updated' => ['required', 'date'],
            'note' => ['required', 'string'],
            'cost' => ['nullable', 'numeric'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->orderUpdate)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->orderUpdate->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('order-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->datetime_updated = $this->orderUpdate->datetime_updated;
        $this->note = $this->orderUpdate->note;
        $this->cost = $this->orderUpdate->cost;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(OrderUpdate $orderUpdate)
    {
        $this->idOrderUpdate = $orderUpdate->id;
        $this->resetForm();
    }
}
