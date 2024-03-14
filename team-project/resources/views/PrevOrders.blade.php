<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>

<body> 

    <nav>
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
    <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
    <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
    </nav>

    <section>
    <h2>Previous Orders</h2>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Order Date</th>
                <th>Order Process</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                @foreach($order->orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $order->Order_ID }}</td>
                        <td>{{ $orderDetail->product->Product_Name }}</td>
                        <td>{{ $orderDetail->Quantity }}</td>
                        <td>{{ $orderDetail->Subtotal }}</td>
                        <td>{{ $order->Order_Date }}</td>
                        <td>{{ $order->Order_Process }}</td>
                        <td>
                            <form method="POST" action="{{ route('return-order', $orderDetail->OrderDetail_ID) }}">
                                @csrf
                                <button type="submit" style="background-color: black; color: white;">Return Order</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</section>

</main>
</body>
</html>