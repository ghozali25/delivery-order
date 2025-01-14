<?php

namespace App\Livewire\Home;

use App\Models\CompanyProfile;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Main extends Component
{
    #[Computed()]
    public function companyProfile()
    {
        return CompanyProfile::first();
    }

    #[Layout('app')]
    public function render()
    {
        return view('livewire.home.main');
    }
}
