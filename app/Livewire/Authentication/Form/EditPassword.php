<?php

namespace App\Livewire\Authentication\Form;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditPassword extends Component
{
    #[Computed()]
    public function authenticatedUser()
    {
        return User::find(Auth::id());
    }

    public $password;
    public $password_confirmation;
    protected function rules()
    {
        return [
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'same:password'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (!$this->authenticatedUser->update($validatedData)) {
            Toaster::error('Data gagal diubah.');
        } else {
            $this->dispatch('user-updated');
            Toaster::success('Data berhasil diubah.');
            $this->resetForm();
        }
    }
    public function resetForm()
    {
        $this->password = null;
        $this->password_confirmation = null;
        $this->validate();
    }

    public function updated($property, $value)
    {
        $this->validate($this->rules(), null, ['password', 'password_confirmation']);
    }
}
