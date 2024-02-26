<?php

namespace App\Livewire;
use App\Models\Product;
use Livewire\Component;

class AddProduct extends Component
{
    public $title;
    public $description;
    public $price;
    public $quantity;
    public $discount_price;

    public function submit(){
        $product=new Product;
        $product->title=$this->title;
        $product->description=$this->description;
        $product->quantity=$this->quantity;
        $product->price=$this->price;
        $product->discount_price=$this->discount_price;
        $product->save();
    }
    public function abc(){

    }




    public function render()
    {
        return view('livewire.add-product');
    }
}
