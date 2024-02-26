{{-- <!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href=" {{route('product_details',['id' => $product->id])}} " class="option1">
                      Product's Details
                      </a>
                      <a href=" {{route('add_to_cart',['id'=>$product->id])}} " class="option2">
                       Add to Cart
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="storage/{{$product->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                    {{$product->title}}
                   </h5>
                   @if ($product->discount_price!=null)
                   <h6 style='text-decoration:line-through ; color:red'>
                    Price <br>
                    ${{$product->price}}
                   </h6>
                   <h6 style="color:blue">
                    Price <br>
                    ${{$product->discount_price}}
                   </h6>
                   @else
                   <h6 style="color:blue">
                    Price <br>
                    ${{$product->price}}
                   </h6>
                   </h6>
                   @endif
                </div>
              </div>
            </div>

    @endforeach

 </div>
        {{$products->links()}}
 </section>
 <!-- end product section --> --}}


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
 </head>
 <body>
    <livewire:products/>
    @livewireScripts
 </body>
 </html>
