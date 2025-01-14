<?php

namespace App\Livewire\Resource\Employee\Form;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Delete extends Component
{
    #[Locked]
    public $idEmployee;
    #[Computed()]
    public function employee()
    {
        return Employee::with('user')->find($this->idEmployee);
    }

    public function submitForm()
    {
        if (Auth::user()->cannot('forceDelete', $this->employee)) {
            Toaster::error('Wewenang tidak sesuai.');
        } else {
            $user = $this->employee->user->delete();
            $employee = $this->employee->delete();
            if (!$user || !$employee) {
                Toaster::error('Data gagal dihapus.');
            } else {
                $this->dispatch('employee-updated');
                Toaster::success('Data berhasil dihapus.');
            }
        }
    }

    public function mount(Employee $employee)
    {
        $this->idEmployee = $employee->id;
    }
}
