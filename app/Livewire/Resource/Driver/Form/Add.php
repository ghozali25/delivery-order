<?php

namespace App\Livewire\Resource\Driver\Form;

use App\Models\Driver;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
    public $ktp;
    public $name;
    public $phone;
    public $address;
    protected function rules()
    {
        return [
            'ktp' => ['required', 'numeric', 'unique:App\Models\Driver,ktp'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric', 'unique:App\Models\Driver,phone'],
            'address' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('create', Driver::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!Driver::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('driver-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->ktp = null;
        $this->name = null;
        $this->phone = null;
        $this->address = null;
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
