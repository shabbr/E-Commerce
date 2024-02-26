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
        <h1>Report details:</h1>
   @foreach ($report_details as $report_detail)
        <p> Costomer Id    : {{$report_detail->customer_id}} </p>
        <p>Customer Name   : {{$report_detail->customer_name}} </p>
        <p>Customer Email  : {{$report_detail->customer_email}} </p>
        <p>Customer Phone  : {{$report_detail->customer_phone}} </p>
     @break:
    @endforeach
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Address</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                </tr>
            </thead>
            <tbody>
@foreach ($report_details as $report_detail)
 @if($report_detail->admin_id==auth()->user()->id)
               <tr>
                <td> {{$report_detail->order_id}}  </td>
                    <td> {{$report_detail->customer_address}}  </td>
                    <td> {{$report_detail->product_id}}  </td>
                    <td> {{$report_detail->product_title}}  </td>
                    <td> {{$report_detail->product_price}}  </td>
                 @php
                 $total=$total+$report_detail->product_price;
                 @endphp
                    <td>{{$report_detail->order_quantity}}</td>
                    <td><img src="{{ asset('storage/'.$report_detail->product_image) }}" /></td>
                    <td> {{$report_detail->payment}} </td>
                    <td> {{$report_detail->delivery_status}} </td>

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
        <h2>Total Products: {{$count}} </h2>

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
