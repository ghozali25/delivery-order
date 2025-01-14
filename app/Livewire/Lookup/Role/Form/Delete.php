<?php

namespace App\Livewire\Lookup\Role\Form;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idRole;
    #[Computed()]
    public function role()
    {
        return Role::find($this->idRole);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->role)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            if (!$this->role->delete()) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('role-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(Role $role)
    {
        $this->idRole = $role->id;
    }
}
