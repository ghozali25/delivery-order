<?php

namespace App\Livewire\Home\Form;

use App\Models\Order;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CheckOrder extends Component
{
    #[Computed()]
    public function order()
    {
        if ($this->id_order > 0) return Order::find(ltrim($this->id_order, 0));
        else return null;
    }



    public $id_order;
    public function submitForm(){
        //
    }



    #[Layout('app')]
    public function render()
    {
        return view('livewire.home.form.check-order');
    }
}
