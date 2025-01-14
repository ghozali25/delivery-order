<?php

namespace App\Livewire\Navigation;

use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Main extends Component
{
    #[Computed()]
    public function authenticatedUser()
    {
        return User::with('role')->find(Auth::id());
    }
    #[Computed()]
    public function currentRouteName()
    {
        return Route::currentRouteName();
    }
    #[Computed()]
    public function companyProfile()
    {
        return CompanyProfile::first();
    }
    #[Computed()]
    public function companyProfileNameExploded()
    {
        return explode(' ', $this->companyProfile->name);
    }

    public function render()
    {
        return view('livewire.navigation.main');
    }
}
