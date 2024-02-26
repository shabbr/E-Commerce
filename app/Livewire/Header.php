<!-- <?php

// namespace App\Livewire;

// use Livewire\Component;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use App\Models\Product;
// use App\Models\Cart;
// class Header extends Component
// {
// public $count=0;

//  public function mount(){
//     $user_id=auth()->user()->id;
//    if(auth()->user()->usertype==0){
//   $this->count=Cart::where('customer_id',$user_id)->count();
//     $products=Product::paginate(10);
//     return view('home.index',['products'=>$products ]);

//    }; -->

//     // $products=Product::paginate(10);
//     // return view('home.index',compact('products' ));
//  }
//  public function val(){

//  }


//  public function redirectToPage(){
//     $products=Product::paginate(10);
//     $usertype= Auth::User()->usertype;
// if($usertype==1){
//     return view('admin.home',compact('products'));
// }else{
//     return view('home.index',compact('products'));
// }
// }


// public function product_details($id){
//     $details=Product::find($id);
//     return view('home.product_details',compact('details'));
// }


//     public function render()
//     {
//         return view('livewire.header');
//     }
// }
