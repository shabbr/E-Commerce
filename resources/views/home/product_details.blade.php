<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;

}

.product-details {
    display: flex;
    max-width: 50%;
    margin: 0 auto;
    background-color: #d7b8b8;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-top: 20px;
}

.product-image {
    flex: 1;
    padding: 20px;
}

.product-image img {
    max-width: 100%;
    height: auto;
}

.product-info {
    flex: 2;
    padding: 20px;
}

.product-title {
    font-size: 24px;
    margin: 0;
    color: #333;
}

.product-description {
    font-size: 16px;
    color: #777;
}

.product-price {
    font-size: 20px;
    font-weight: bold;
    color: #f93e3e;
    margin-top: 10px;
}
 .add-to-cart-button {
    background-color: blue;
    color: black;
    padding: 10px 10px;
    border: none;
    border-radius: 5px;
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;

}

.add-to-cart-button:hover {
    background-color: #ff5d5d;
}

</style>
   </head>
   <body>

        @include('home.header');
        <div class="product-details">
            <div class="product-image">
                <img src="storage/{{$details->image}}" alt="">
            </div>
            <div class="product-info">

                <h1 class="product-title"> {{$details->title}} </h1>
                <p class="product-description"> {{$details->description}}</p>
                <p class="product-price"> {{$details->price}}</p>
                <p class="product-price"> {{$details->descount_price}}</p>
              <p class="product-title">   Available quantity:{{$details->quantity}}</p>
                {{-- available quantity --}}
                @if($details->quantity<=0)
                {{'This product is not available'}}
                @else
                <form method="post" action="{{route('detail_cart',['id' => $details->id])}}">
                    @csrf
                    <input type="number" placeholder='quantity' name='quantity'>
                    <span>Please never select more than {{$details->quantity}} </span> <br>
       <button  type='submit' class="add-to-cart-button " >Add to Cart</button>
    </form>
    @endif
   </div>
            </div>

      @include('home.footer')

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
