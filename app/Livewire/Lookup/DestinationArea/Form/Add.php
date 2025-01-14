<?php

namespace App\Livewire\Lookup\DestinationArea\Form;

use App\Models\DestinationArea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Add extends Component
{
    public $abbreviation;
    public $name;
    protected function rules()
    {
        return [
            'abbreviation' => ['nullable', 'string', 'unique:App\Models\DestinationArea,abbreviation'],
            'name' => ['required', 'string', 'unique:App\Models\DestinationArea,name'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('create', DestinationArea::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!DestinationArea::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('destination-area-updated');
                Toaster::success('Data berhasil ditambahkan.');
                $this->resetForm();
            }
        }
    }
    public function resetForm()
    {
        $this->abbreviation = null;
        $this->name = null;
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
