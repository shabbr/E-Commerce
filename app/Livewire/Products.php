<?php

namespace App\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
 use App\Models\Product;
 use App\Models\Cart;
use Livewire\Component;

class Products extends Component
{
    public $message;
    public $empty;
    public function render()
    {
        $products=Product::paginate(10);
        return view('livewire.products' ,compact('products'));
    }




        public function index(){
           $products=Product::paginate(10);
           return view('home.index',compact('products'));
        }

           public function red(){
               $products=Product::paginate(10);
               $usertype= Auth::User()->usertype;
           if($usertype==1){
               return view('admin.home',compact('products'));
           }else{
               return view('home.index',compact('products'));
           }
           }


           public function product_details($id){
               $details=Product::find($id);
               return view('home.product_details',compact('details'));
           }

           public function products($id){

                if(auth()->user()  ){
                  $user_id=auth()->user()->id;
                  $user=User::find($user_id);
                  $product=Product::find($id);

                  $cart=new Cart;
                  if($product->quantity<=0){
                    $this->empty="Product not Available";
                }else{
                  $cart->customer_id=$user->id;
                  $cart->admin_id=$product->admin_id;
                  $cart->product_id=$product->id;
                  $cart->quantity=1;
                  $cart->save();
              $product->quantity=$product->quantity-1;
              $product->save();
        $this->message="Your Product Added";
               }

            }
               else{
                    return redirect('/login');
                  }
               }
                   public function clearAlert(){
                    $this->message='';
                    $this->empty='';
                }

        }
