<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\View;
use Session;
use Stripe;


class CartController extends Controller
{
    public $search;
      public function detail_cart(Request $request,$id){
  if(auth()->user()){
      $user_id=auth()->user()->id;
    $user=User::find($user_id);
    $product=Product::find($id);
    if($request->quantity>=$product->quantity){
    return redirect()->back();
    }else{
    $cart=new Cart;
    $cart->customer_id=$user->id;
    $cart->admin_id=$product->admin_id;
    $cart->product_id=$product->id;
    $cart->quantity=$request->quantity;
    }
$cart->save();
 $product->quantity=$product->quantity-$request->quantity;
 $product->save();
echo "<script> alert('Product Added in Cart');
   window.location.href=('/');
</script>";
  }else{
    return redirect('/login');
  }
    }

public function cart_show($id){
     $cart=Cart::join('users','users.id','=','cart.customer_id')
    ->join('products','products.id','=','cart.product_id')
    ->select(
        'cart.id AS cart_id',
        'cart.customer_id AS customer_id',
        'cart.quantity AS cart_quantity',
        'products.id AS product_id',
        'products.title AS product_name',
        'products.description AS product_description',
        'users.id AS user_id',
        \DB::raw('COALESCE(products.price,products.discount_price) AS product_price')
    )->get();
    $user=Auth::user();
    $user_type=$user->usertype;
    $user_id=auth()->user()->id;
    // $customer_id=$id;
   $count=0;
   $total=0;
   $orders=0;
    return view('admin.cart',['id' => $user_id,'cart' => $cart,'count' =>$count , 'total' => $total]);
}

    public function admin_order_show($id){
        // public $admin_id;
        if(auth()->user()){
            $order=Order::join('users','orders.customer_id','=','users.id')
            ->join('products','orders.product_id','=','products.id')
            ->select(
                'orders.id AS order_id',
                'orders.customer_id AS customer_id',
                'orders.admin_id AS admin_id',
                'orders.quantity AS order_quantity',
                'orders.payment AS payment',
                'orders.delivery_status AS delivery_status',
                'users.name AS customer_name',
                'users.email AS customer_email',
                'users.phone AS customer_phone',
                'users.address AS customer_address',
                'products.id AS product_id',
                'products.title AS product_title',
                'products.image AS product_image',
                'products.id AS product_id',
                \DB::raw('COALESCE(products.price, products.discount_price) AS product_price')
            )->get();

            $user=Auth::user();
           $user_type=$user->usertype;
           $user_id=auth()->user()->id;
           $customer_id=$id;
          $count=0;
          $total=0;
          $orders=0;
          $data=false;

    //   if($user_type==0){
    //        return view('admin.cart',['id' => $user_id,'orders' => $order,'customer_id' =>$customer_id,'count' =>$count , 'total' => $total]);
    //     }
        // elseif($user_type==1){
            return view('admin.admin_cart',['id' => $user_id, 'orders' => $order,'count' =>$count , 'total' => $total,'data'=>$data]);
       // }
    }
    }
public function payment_staus($id){
    $payment=Order::find($id);
    $payment->payment='paid';
    $payment->save();
    return redirect()->back();
}
    public function admin_order_search(Request $request){
        $search=$request->search;
        $admin_id=auth()->user()->id;
            if(auth()->user()){
            $order=Order::join('users','orders.customer_id','=','users.id')
            ->join('products','orders.product_id','=','products.id')
            ->select(
                'orders.id AS order_id',
                'orders.customer_id AS customer_id',
                'orders.admin_id AS admin_id',
                'orders.quantity AS order_quantity',
                'orders.delivery_status AS delivery_status',
                'users.name AS customer_name',
                'users.email AS customer_email',
                'users.phone AS customer_phone',
                'users.address AS customer_address',
                'products.id AS product_id',
                'products.title AS product_title',
                'products.image AS product_image',
                'products.id AS product_id',
                \DB::raw('COALESCE(products.price, products.discount_price) AS product_price')
            )->where('orders.admin_id','=',"$admin_id")
            ->where('products.title','LIKE',"%$search%")
            ->get();

            $user=Auth::user();
           $user_type=$user->usertype;
           $user_id=auth()->user()->id;
          $count=0;
          $total=0;
          $orders=0;
    return view('admin.admin_cart',['id' => $user_id, 'orders' => $order,'count' =>$count , 'total' => $total]);
}
    }
    public function order($id){
        $order_id=Order::max('id');
        if(is_null($order_id)){
            $order_id=1;
        }
       $products=Cart::where('customer_id',$id)->get();
        foreach($products as $product){
        $order=new Order;
        $order->customer_id=$product->customer_id;
        $order->admin_id=$product->admin_id;
        $order->product_id=$product->product_id;
        $order->quantity=$product->quantity;
        $order->admin_id=$product->admin_id;
    $order->order_id=$order_id;
        $order->payment="proccessing";
        $order->save();
        }
 Cart::where('customer_id',$id)->delete();
return redirect()->back();
    }
    public function cancel_order($row_id){
        $delete=Cart::find($row_id)->delete();
        $user_id=auth()->user()->id;
        return redirect('cart/{user_id}');
    }
    public function show_order($id){
        if(auth()->user()){
           //  $order=Order::where('customer_id',$id)->get();
            $order = Order::join('users', 'users.id', '=', 'orders.customer_id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select(
                'orders.id AS order_id',
                'users.id AS user_id',
                'products.id AS product_id',
                'products.title AS product_title',
                'products.description AS product_description',
                'orders.quantity AS quantity',
                'orders.payment AS payment',
                'orders.delivery_status AS delivery_status',
                'orders.created_at AS order_date',
                \DB::raw('COALESCE(products.price, products.discount_price) AS price')
            )->get();
           $user=Auth::user();
           $user_type=$user->usertype;
           $user_id=auth()->user()->id;
          $count=0;
          $total=0;
           return view('admin.order',['id' => $user_id,'orders' => $order,'count' =>$count , 'total' => $total]);
        }
    }
public function user_order_search(Request $request){
    if(auth()->user()){
        $search=$request->search;
        $order = Order::join('users', 'users.id', '=', 'orders.customer_id')
         ->join('products', 'orders.product_id', '=', 'products.id')
         ->select(
             'orders.id AS order_id',
             'users.id AS user_id',
             'products.id AS product_id',
             'products.title AS product_title',
             'products.description AS product_description',
             'orders.quantity AS quantity',
             'orders.payment AS payment',
             'orders.delivery_status AS delivery_status',
             'orders.created_at AS order_date',
             \DB::raw('COALESCE(products.price, products.discount_price) AS price')
         )->where('products.title', 'LIKE', "%$search%")->get();

        $user=Auth::user();
        $user_type=$user->usertype;
        $user_id=auth()->user()->id;
       $count=0;
       $total=0;
        return view('admin.order',['id' => $user_id,'orders' => $order,'count' =>$count , 'total' => $total]);
     }

}




    public function delivery($id){
        $product=Order::find($id);
        $product->delivery_status='delivered';
        $product->save();
        return redirect()->back();
    }
    public function bill($id) {
        $record = User::join('orders', 'users.id', '=', 'orders.customer_id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select(
                'orders.id AS order_id',
                'users.id AS customer_id',
                'users.name AS customer_name',
                'products.title AS product_title',
                'orders.created_at AS order_date',
                \DB::raw('COALESCE(products.price, products.discount_price) AS price')
            )
            ->where('orders.id', $id)
            ->get();



        $bill = PDF::loadView('pdf_bill', compact('record'));

        return $bill->download('bill.pdf');
    }
    public function stripe($total){
         return view('home.stripe',compact('total'));
    }

    public function stripePay(Request $request,$total_price){

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => $total_price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Thanks for payment"
            ]);

                      $id =auth()->user()->id;
                      $order_id=Order::max('id');
                      if(is_null($order_id)){
                        $order_id=1;
                      }
                       $products=Cart::where('customer_id',$id)->get();
                        foreach($products as $product){
                        $order=new Order;
                        $order->order_id=$order_id;
                        $order->customer_id=$product->customer_id;
                        $order->admin_id=$product->admin_id;
                        $order->product_id=$product->product_id;
                        $order->quantity=$product->quantity;
                        $order->payment="paid";
                        $order->save();
                        }
                 Cart::where('customer_id',$id)->delete();

            Session::flash('success', 'Payment successful!');
            return redirect()->route('cart',['id'=>$id]);
        }
}
