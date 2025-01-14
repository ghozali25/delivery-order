<?php

namespace App\Livewire\Order\Form;

use App\Models\Employee;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditEmployee extends Component
{
    #[Locked]
    public $idOrder;
    #[Computed()]
    public function order()
    {
        return Order::find($this->idOrder);
    }
    #[Computed()]
    public function employee()
    {
        return Employee::firstWhere('id_user', Auth::id());
    }
    
    public function submitForm()
    {
        if (Auth::user()->cannot('update', $this->order)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->order->update([
                'id_employee' => $this->employee->id,
                'datetime_confirmed' => Carbon::now(),
            ])) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('order-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }

    public function mount(Order $order)
    {
        $this->idOrder = $order->id;
    }
}
