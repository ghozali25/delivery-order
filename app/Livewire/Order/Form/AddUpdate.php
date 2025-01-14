<?php

namespace App\Livewire\Order\Form;

use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderUpdate;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddUpdate extends Component
{
    #[Locked]
    public $idOrder;

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
        $validatedData['id_employee'] = Employee::firstWhere('id_user', Auth::id())->id;
        $validatedData['id_order'] = $this->idOrder;
        $validatedData['datetime_updated'] = Carbon::now();
        if (Auth::user()->cannot('create', OrderUpdate::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!OrderUpdate::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('order-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->datetime_updated = Carbon::now()->isoFormat('YYYY-MM-DD HH:mm:SS');
        $this->note = null;
        $this->cost = null;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Order $order)
    {
        $this->idOrder = $order->id;
        $this->resetForm();
    }
}
