<!DOCTYPE html>
<html>
<head>
    <title>Order Reports</title>
    <link href="{{ asset('css/orderReport.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
    <h1>Order Reports</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer/Admin Username</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ $orderDetail->OrderDetail_ID }}</td>
                <td>
                    @if($orderDetail->order->customer)
                        {{ $orderDetail->order->customer->user->Username }}
                    @elseif($orderDetail->order->admin)
                        {{ $orderDetail->order->admin->user->Username }}
                    @endif
                </td>                
                <td>{{ $orderDetail->product->Product_Name }}</td>
                <td>{{ $orderDetail->Quantity }}</td>
                <td>{{ $orderDetail->Subtotal }}</td>
                <td>{{ $orderDetail->order->Order_Date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
