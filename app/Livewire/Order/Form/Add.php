<?php

namespace App\Livewire\Order\Form;

use App\Models\Client;
use App\Models\DeliveryCost;
use App\Models\DestinationArea;
use App\Models\Order;
use App\Models\VehicleType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
    #[Computed()]
    public function clients()
    {
        return Client::orderBy('name')->get();
    }
    #[Computed()]
    public function destinationAreas()
    {
        return DestinationArea::orderBy('name')->get();
    }

    public $id_client;
    public $cargo_name;
    public $cargo_weight_kg;
    public $cargo_note;
    public $recipient_name;
    public $recipient_phone;
    public $recipient_address;
    public $id_destination_area;
    protected function rules()
    {
        return [
            'id_client' => ['required', 'numeric', 'exists:App\Models\Client,id'],
            'cargo_name' => ['required', 'string'],
            'cargo_weight_kg' => ['required', 'numeric', 'max:4000'],
            'cargo_note' => ['nullable', 'string'],
            'recipient_name' => ['nullable', 'string'],
            'recipient_phone' => ['nullable', 'numeric'],
            'recipient_address' => ['required', 'string'],
            'id_destination_area' => ['required', 'numeric', 'exists:App\Models\DestinationArea,id'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $idVehicleType = VehicleType::where('max_cargo_weight_kg', '>=', $validatedData['cargo_weight_kg'])->orderBy('max_cargo_weight_kg')->first()->id;
        $validatedData['cost'] = DeliveryCost::where('id_destination_area', $validatedData['id_destination_area'])
            ->where('id_vehicle_type', $idVehicleType)
            ->first()
            ->cost_first;
        $validatedData['datetime_ordered'] = Carbon::now();
        if (Auth::user()->cannot('create', Order::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!Order::create($validatedData)) {
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
        $this->id_client = null;
        $this->cargo_name = null;
        $this->cargo_weight_kg = null;
        $this->cargo_note = null;
        $this->recipient_name = null;
        $this->recipient_phone = null;
        $this->recipient_address = null;
        $this->id_destination_area = null;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount()
    {
        $this->resetForm();
    }
}