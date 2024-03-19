<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/prevorders.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<<<<<<< HEAD
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

<button onclick="goBack()" class="custom-button">Previous Page</button>

<script>
function goBack() {
window.history.back();
}
</script>

<style>
.custom-button {
background-color: var(--accent-color);
color: var(--secondary-color);
border: none;
padding: 10px 20px;
font-size: 1rem;
cursor: pointer;
transition: background-color 0.3s, color 0.3s;
border-radius: 5px;
}

.custom-button:hover {
background-color: var(--secondary-color);
color: var(--accent-color);
}
</style>

=======
</head>

<body> 

    <nav>
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
    <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
    <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
    <a href="forum"><i class="fa fa-list-alt"></i> Forums</a>
    </nav>
>>>>>>> parent of 4746b6c (added footer and header to forum prev orders)

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