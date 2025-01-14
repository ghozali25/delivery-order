<?php

namespace App\Livewire\Resource\Driver\Form;

use App\Models\Driver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idDriver;
    #[Computed()]
    public function driver()
    {
        return Driver::find($this->idDriver);
    }

    public $ktp;
    public $name;
    public $phone;
    public $address;
    public $is_active;
    protected function rules()
    {
        return [
            'ktp' => ['required', 'numeric', 'unique:App\Models\Driver,ktp,' . $this->idDriver],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'unique:App\Models\Driver,phone,' . $this->idDriver],
            'address' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        $validatedData['datetime_inactive'] = $validatedData['is_active'] ? null : Carbon::now();
        if (Auth::user()->cannot('update', $this->driver)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->driver->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('driver-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->ktp = $this->driver->ktp;
        $this->name = $this->driver->name;
        $this->phone = $this->driver->phone;
        $this->address = $this->driver->address;
        $this->is_active = $this->driver->datetime_inactive ? false : true;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Driver $driver)
    {
        $this->idDriver = $driver->id;
        $this->resetForm();
    }
}
