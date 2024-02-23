<!DOCTYPE html>
<html>
<head>
    <title>Order Reports</title>
    <link href="{{ asset('css/orderReport.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
    <h1>Order Reports</h1>
    <div class="log-out-box">
        @auth
        <div>
            <span>Welcome {{ auth()->user()->Username }}</span>
        </div>
        <form class="inLine" method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @endauth
    </div>
    
    <nav>
        <a href="home"><i class="fas fa-home"></i> Home</a>
        <a href="profile"><i class="fas fa-user"></i> Profile</a>
        <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
        <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
        
        @if(Auth::check() && Auth::user()->User_Type === 'Admin')
            <a href="create"><i class="fas fa-plus"></i> Create</a>
            <a href="search"><i class="fas fa-search"></i> Search</a>
            <a href="list"><i class="fas fa-list"></i> List</a>
            <a href="{{ route('order-report') }}"><i class="far fa-file-alt"></i> Order Reports</a>
            <a href="{{ route('product-report') }}"><i class="far fa-file-alt"></i> Product Report</a>
        @endif
        
        <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
        <a href="register"><i class="fas fa-user-plus"></i> Register</a>
        <a href="about"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
    </nav>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer/Admin Username</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Order Date</th>
                <th>Order Process</th>
                <th></th>
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
                <td class="
                    @if($orderDetail->order->Order_Process === 'Order Processing...')
                        processing
                    @elseif($orderDetail->order->Order_Process === 'Order Processed')
                        processed
                    @endif
                ">
                    {{ $orderDetail->order->Order_Process }}
                </td>
                <td>
                    <form method="POST" action="{{ route('updateOrderProcess', $orderDetail->order->Order_ID) }}">
                        @csrf
                        <button class="order-processing-btn" type="submit">Process Order</button>
                    </form>   
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
