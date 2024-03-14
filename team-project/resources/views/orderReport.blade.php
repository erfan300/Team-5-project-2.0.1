<!DOCTYPE html>
<html>
<head>
    <title>Order Reports</title>
    <link href="{{ asset('css/orderReport.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<header>
    
    <div class="top-left">
        <div class="login-buttons">
            <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
            <a href="register"><i class="fas fa-user-plus"></i> Register</a>
            @auth
                <a href="profile"><i class="fas fa-user"></i> Profile</a>
            @endauth
        </div>
    </div>
    <h1>BOOKS<span>4</span>U</h1>
    <div class="session-message">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    @auth
        <div class="log-out-box">
            <form class="inLine" method="POST" action="/logout">
                @csrf
                <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
        <div class="welcome-message">
            <span>Welcome {{ auth()->user()->Username }}</span>
        </div>
    @endauth
</header>

<nav>
    <a href="home"><i class="fas fa-home"></i> Home</a>
    <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
    <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
    
    @if(Auth::check() && Auth::user()->User_Type === 'Admin')
        <a href="create"><i class="fas fa-plus-circle"></i> Create</a>
        <a href="search"><i class="fas fa-search"></i> Search</a>
        <a href="list"><i class="fas fa-list"></i> List</a>
        <a href="{{ route('order-report') }}"><i class="fas fa-chart-bar"></i> Order Report</a>
        <a href="{{ route('product-report') }}"><i class="fas fa-chart-pie"></i> Product Report</a>
        <a href="{{ route('discountpage') }}"><i class="fas fa-tags"></i> Discount Page</a>
    @endif
    
    <a href="about"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
</nav>

<br>


    <h2>Order Report</h2>

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
