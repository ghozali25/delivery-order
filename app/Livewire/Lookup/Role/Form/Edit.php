<?php

namespace App\Livewire\Lookup\Role\Form;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Edit extends Component
{
    #[Locked]
    public $idRole;
    #[Computed()]
    public function role()
    {
        return Role::find($this->idRole);
    }

    public $abbreviation;
    public $name;
    protected function rules()
    {
        return [
            'abbreviation' => ['nullable', 'string', 'unique:App\Models\Role,abbreviation,' . $this->idRole],
            'name' => ['required', 'string', 'unique:App\Models\Role,name,' . $this->idRole],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (Auth::user()->cannot('update', $this->role)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->role->update($validatedData)) {
                Toaster::error('Data gagal diubah.');
            } else {
                $this->dispatch('role-updated');
                Toaster::success('Data berhasil diubah.');
            }
        }
    }
    public function resetForm()
    {
        $this->abbreviation = $this->role->abbreviation;
        $this->name = $this->role->name;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }
    public function mount(Role $role)
    {
        $this->idRole = $role->id;
        $this->resetForm();
    }
}
