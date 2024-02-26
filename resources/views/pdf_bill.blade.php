<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom CSS for styling */
        .bill-row {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #e9ecef;
        }
        .bill-heading {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Bill</h1>

        @foreach ($record as $item)
            @php
                $data = json_decode($item, true);
            @endphp

            <div class="bill-row">
                <p><strong>Order ID:</strong> {{ $data['order_id'] }}</p>
                <p><strong>Customer ID:</strong> {{ $data['customer_id'] }}</p>
                <p><strong>Customer Name:</strong> {{ $data['customer_name'] }}</p>
                <p><strong>Product Title:</strong> {{ $data['product_title'] }}</p>
                <p><strong>Order Date:</strong> {{ $data['order_date'] }}</p>
                <p><strong>Price:</strong> {{ $data['price'] }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>
