<?php

namespace App\Livewire\Authentication\Form;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Login extends Component
{
    public $email;
    public $password;
    protected function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        if (!Auth::attempt($validatedData)) {
            Toaster::error('Login gagal.');
        } else {
            Session::regenerate();
            $user = User::with('role')->find(Auth::id());
            $user->update(['datetime_last_login' => Carbon::now()]);
            Toaster::success('Login berhasil.');
            return redirect()->route('order');
        }
    }
    public function resetForm()
    {
        $this->email = null;
        $this->password = null;
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
    #[Layout('app')]
    public function render()
    {
        return view('livewire.authentication.form.login');
    }
}
