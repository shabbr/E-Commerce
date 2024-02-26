<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.verification');
    }

 public function index(){
    $products=Product::paginate(10);
    return view('home.index',compact('products'));
 }

 public function productView(){
    return view('home.productView');
 }
    public function redirect(){

        $products=Product::paginate(10);
        $usertype= Auth::user()->usertype;
        $user_id=Auth::user()->id;
        $userName=Auth::user()->name;
    if($usertype==1){

        $total_products=Product::where('admin_id','=',$user_id)->count();
        $total_orders=Order::where('admin_id','=',$user_id)->count();
        $total_revenue=Order::join('products', 'orders.product_id', '=', 'products.id')
        ->select(\DB::raw('SUM(CASE WHEN products.discount_price IS NOT NULL THEN products.discount_price ELSE products.price END) AS total_price'))
        ->where('orders.admin_id','=',$user_id)
        ->where('orders.payment', '=', 'paid')
        ->value('total_price');
        if(is_null($total_revenue)){
            $total_revenue=0;
        };

        $unpaid_orders=Order::where('admin_id','=',$user_id)
        ->where('payment','=','proccessing')
        ->count();
        $paid_orders=Order::where('admin_id','=',$user_id)
        ->where('payment','=','paid')
        ->count();
        $delivered_orders=Order::where('admin_id','=',$user_id)
        ->where('delivery_status','=','delivered')
        ->count();
        return view('admin.home',compact('userName','products', 'total_products','total_orders','total_revenue','unpaid_orders','paid_orders','delivered_orders'));
    }else{
        return view('home.index',compact('products'));
    }
    }

    public function products(){
        return view('home.index');
    }

    public function product_details($id){
        $details=Product::find($id);
        return view('home.product_details',compact('details'));
    }


}
