<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function categories(){
        $categories=Category::all();
        return view('admin.categories',compact('categories'));
    }
   public function add_category(Request $request){
    $category=new Category;
    $category->category=$request->category;
    $category->save();
    return redirect('categories')->with('message','Category Added Successfully');
   }


public function delete_category($id){
    $id=Category::find($id)->delete();
    return redirect('categories')->with('del_message','Category is deleted');
}
public function add_product(){
    $categories=Category::all();
    return view('admin.product_form',['categories' => $categories]);
}

public function product_added(Request $request){
   $data=$this->validate($request,[
   'title' => 'required',
        'description' => 'required|min:10',
        'price' => 'required',
        'image'=>'required|mimes:jpeg,jpg,png',
        'category'=>'required',
        'quantity' => 'required|numeric|min:1',
       'discount_price' =>'required'
    ]);
 $product=new Product;
 $admin_id=auth()->user()->id;
 $product->admin_id=$admin_id;
 $product->title=$request->title;
 $product->description=$request->description;
 $product->quantity=$request->quantity;
 $product->category=$request->category;
 $product->quantity=$request->quantity;
 $product->price=$request->price;
 $product->discount_price=$request->discount_price;

$product->image = $request->file('image')->store('product_images', 'public');
$product->save();

 return redirect('add_product');
}


public function show_product(){
    $products=Product::all();
 $categories=Category::all();
   return view('admin.products_show',['products' => $products,'categories' => $categories]);
}


public function edit_product($id){
  $product=Product::find($id);
    $cat_id=$product->category;
    $myCategory=Category::find($cat_id);
    $categories=Category::all();
  return view('admin.product_edit',[
    'product'=>$product,
    'myCategory'=>$myCategory,
  'category' => $categories
  ]);
}

public function delete_product($id){
    $product=Product::find($id)->delete();
    return redirect('show_product');


}




//update product
public function update_product(Request $request,$id){
    $update=Product::find($id);
    $update->title=$request->title;
    $update->description=$request->description;
    $update->category=$request->category;
    $update->quantity=$request->quantity;
    $update->price=$request->price;
    $update->discount_price=$request->discount_price;
   $update->save();
   return redirect('show_product');
}

public function reports(){
    $reports = Order::whereIn('order_id', function ($query) {
    $query->select('order_id')
        ->distinct()
        ->from('orders');
})
->join('products', 'orders.product_id', '=', 'products.id')
->join('users', 'orders.customer_id', '=', 'users.id')
->selectRaw('orders.order_id, users.name as customer_name,
    SUM(CASE WHEN products.discount_price IS NULL THEN products.price ELSE products.discount_price END) as total_amount,
    orders.order_id, SUM(orders.quantity) as total_quantity,
    MAX(orders.created_at) as order_date,
    orders.admin_id as admin_id,
    users.id as customer_id,
    users.email as customer_email,
    users.phone as customer_phone')
->groupBy('order_id', 'users.name','users.id', 'users.email','users.phone','admin_id')
->get();
  $user_id=Auth::user()->id;

return view('admin.reports',['reports'=> $reports,'user_id'=> $user_id]);
}

public function report_details($order_id,$admin_id){
$report_details=Order::join('users','orders.customer_id','=','users.id')
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
                \DB::raw('COALESCE(products.price, products.discount_price) AS product_price'))
                ->where('orders.order_id','=', $order_id)
                ->where('orders.admin_id','=',$admin_id)
                ->get();
                $total=0;
                $count=0;
           return view('admin.report_details',compact('report_details','admin_id','total','count'));
}
}
