<?php

namespace App\Livewire;

use Livewire\Component;

class AddToCart extends Component
{
    public $msg;
    public function show(){
       $this->msg= 'welcome sir';

    }
    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
