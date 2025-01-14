<?php

namespace App\Livewire\Lookup\Role\Form;

use App\Models\Role;
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
            'abbreviation' => ['nullable', 'string', 'unique:App\Models\Role,abbreviation'],
            'name' => ['required', 'string', 'unique:App\Models\Role,name'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('create', Role::class)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!Role::create($validatedData)) {
                Toaster::error('Data gagal ditambahkan.');
            } else {
                $this->dispatch('role-updated');
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
