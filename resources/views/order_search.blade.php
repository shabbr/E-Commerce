<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  {{-- my all  Order --}}

  <div class="container">

    <h1 class="text-center mt-5 mb-4">Orders</h1>
    <form action="{{route('user_order_search',['id'=> $id])}}" class="m-3">
     @csrf
        <input type="search" name="search" placeholder="Search" class=" bg-dark text-white">
        <input type="submit" name="submit" value="search">
    </form>
     <table class="table table-dark table-striped table-bordered"  >
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($orders as $order)
            @if($id ==$order->user_id)
               <tr>
                    <td> {{$order->order_id}} </td>
                    <td> {{$order->product_title}} </td>
                    <td> {{$order->product_description}} </td>
                    <td> {{$order->price}} </td>
                    @php
                    $total=$total+$order->price;
                    @endphp
                    <td> {{$order->quantity}} </td>
                    <td> {{$order->payment}} </td>
                    <td> {{$order->delivery_status}} </td>
                    <td><a class="btn btn-primary" href="{{route('bill',['id'=>$order->order_id])}}">Bill</a></td>
               </tr>
             @php
                 $count= $count+ 1;
             @endphp
            @endif
            @empty
                <tr>
                    <td colspan='7'>
                        <h3>No Record Found</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><h5>Total:</h5></td>
                <td><h5>${{$total}}</h5> </td>
            </tr>
        </tfoot>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
