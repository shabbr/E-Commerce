<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Products</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h1>Your Cart</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
@foreach ($cart as $mycart)
 @if($mycart->customer_id==$id)
               <tr>
                <td> {{$mycart->product_id}} </td>
                    <td> {{$mycart->product_name}} </td>
                    <td> {{$mycart->product_description}} </td>
                   <td> {{$mycart->product_price}} </td>
                    @php
                    $total=$total+$mycart->product_price;
                    @endphp
                    <td> {{$mycart->cart_quantity}} </td>
                    {{-- <td> <a href=" {{route('bill',['id' => $mycart->id])}} " class="btn btn-primary">Download </a> </td> --}}
                    <td> <a onclick="showAlert('Success', 'product remove successfully', 'success')"    href="{{route('cancel_order' ,['row_id' => $mycart->cart_id])}}" class="btn btn-danger"> Cancel</a></td>
                  </tr>
             @php
                 $count= $count+ 1;
             @endphp
               @endif()
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><h5>Total:</h5></td>
                    <td><h5>${{$total}}</h5> </td>
                </tr>

            </tfoot>
        </table>
        <h2>Order by:
            <a onclick="order('Success', 'Order Successful','success')"   href="{{route('order' ,['id' => $id])}}" class="btn btn-primary">Cash on Delivery</a>
            <a href="{{route('stripe',['total'=> $total])}}" class=" btn btn-primary">Pay Online</a>

        </h2>

        <h2>Your have {{$count}} products</h2>
    </div>
    <script>
      function showAlert(title, message, type = 'success') {
    Swal.fire({
        title: title,
        text: message,
        icon: type
    });
}
function order(title,message,type='success'){
Swal.fire({
   title:title,
   text:message,
   icon:type
})
}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

