<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include('admin.css')
    <style>
        body{
            background-color:black;
        color: white;
    }
    tr{
        color:white;
    }
    img{
        height:55%;
        width:55%;
    }
   .width{
    margin-left:10%;
    width :80%;
   }
 </style>
</head>
<body>




    <div class="width">

        <h1>Your Received Orders</h1>
        <form action="{{route('admin_order_search')}}" class="m-2">
@csrf
            <input type="search" name="search" placeholder="Search" class="bg-dark text-white border">
             <input type="submit" value="Search">
        </form>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Paid</th>
                      <th>Delivered </th>
                      <th>Generate Bill </th>
                </tr>
            </thead>
            <tbody>
@foreach ($orders as $order)
 @if($order->admin_id==$id)
               <tr>
                    <td> {{$order->customer_id}} </td>
                    <td> {{$order->customer_name}}  </td>
                    <td> {{$order->customer_email}}  </td>
                    <td> {{$order->customer_phone}}  </td>
                    <td> {{$order->customer_address}}  </td>
                    <td> {{$order->product_id}}  </td>
                    <td> {{$order->product_title}}  </td>
                    <td> {{$order->product_price}}  </td>
                 @php
                 $total=$total+$order->product_price;
                 @endphp
                    <td>{{$order->order_quantity}}</td>
                    <td><img src="{{ asset('storage/'.$order->product_image) }}" /></td>
                    <td> {{$order->payment}} </td>
                    <td> {{$order->delivery_status}}  </td>
                    <td><a href=" {{route('payment_status',['id' => $order->order_id])}} " class="btn btn-danger">Paid</a></td>
                        <td> <a href="  {{route('delivery',['id' => $order->order_id])}} " class="btn btn-danger">Delivery</a> </td>
                     <td> <a href=" {{route('bill',['id' => $order->order_id])}} " class="btn btn-primary">Download </a> </td>
             @php
                 $count= $count+ 1;
             @endphp
               @endif()
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="text-right"> <h5>Total:</h5> </td>
                    <td> <h5> ${{$total}} </h5></td>
                </tr>
            </tfoot>
        </table>
        <h2>Your have {{$count}} orders</h2>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



{{--
<!DOCTYPE html>
 <html lang="en">
   <head>
     @include('admin.css')
   </head>
   <body>
     <div class="container-scroller">


         @include('admin.navbar')


             <div class="">
       @include('admin.sidebar') --}}
       <!-- partial -->

         <!-- partial -->
         {{-- @include('admin.body') --}}

     <!-- container-scroller -->
     <!-- plugins:js -->
     {{-- @include('admin.script')
   </body>
 </html> --}}
