<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function data(){
     $data=Product::active()->get();
     dd($data);
     }
     public function second(){
      $data=Product::second()->get();
      dd($data);
     }
     public function third(){
        $data=Product::third()->get();
        dd($data);
     }
}
