<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
 html{
        background-color: black;
    }
    body{
        background-color: black;
        color: white;
    }

</style>
</head>
<body>

  {{-- my all  Order --}}

  <div class="container">
    <h1 class="text-center mt-5 mb-4">Orders</h1>
     <table class="table table-dark table-striped table-bordered"  >
        <thead>
            <tr>
                <tr>
                    <th>Order Id</th>

                    <th>Customer Name</th>
                    <th>Total Price</th>
                    <th>Total Products</th>
                    <th>Timestamps</th>
                    <th>Action</th>
                </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)

            <tr>
                    @if($report->admin_id == auth()->user()->id)
                            <td> {{$report->order_id}} </td>
                            <td> {{$report->customer_name}} </td>

                            <td> {{$report->total_amount}} </td>
                            <td> {{$report->total_quantity}} </td>
                            <td> {{$report->order_date}} </td>
                            <td> <a href=" {{route('report_details',['order_id' =>$report->order_id,'admin_id'=>$report->admin_id])}}" class="btn btn-primary">Details</a> </td>
                     @endif
            </tr>
                 @endforeach
</tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><h5>Total:</h5></td>
                <td><h5> </h5> </td>
            </tr>

        </tfoot>
    </table>

</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

