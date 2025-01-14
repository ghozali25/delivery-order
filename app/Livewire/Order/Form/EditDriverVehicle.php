<?php

namespace App\Livewire\Order\Form;

use App\Models\Driver;
use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditDriverVehicle extends Component
{
    #[Locked]
    public $idOrder;
    #[Computed()]
    public function order()
    {
        return Order::find($this->idOrder);
    }
    #[Computed()]
    public function availableDrivers()
    {
        return Driver::orderBy('updated_at')->get();
    }
    #[Computed()]
    public function availableVehicles()
    {
        return Vehicle::with('vehicle_type')->orderBy('updated_at')->get();
    }

    public $id_driver;
    public $id_vehicle;
    public $datetime_assigned;
    protected function rules()
    {
        return [
            'id_driver' => ['required', 'numeric', 'exists:App\Models\Driver,id'],
            'id_vehicle' => ['required', 'numeric', 'exists:App\Models\Vehicle,id'],
            'datetime_assigned' => ['required', 'date'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->order)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->order->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('order-updated');
                Toaster::success('Data berhasil diubah.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->id_driver = $this->order->id_driver;
        $this->id_vehicle = $this->order->id_vehicle;
        $this->datetime_assigned = Carbon::parse($this->order->datetime_assigned)->isoFormat('YYYY-MM-DD HH:mm:SS');
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
