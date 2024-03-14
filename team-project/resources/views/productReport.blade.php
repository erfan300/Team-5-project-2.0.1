<!DOCTYPE html>
<html>
<head>
    <title>Product Report</title>
    <link href="{{ asset('css/productReport.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
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


    <h2>Product Report</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Author</th>
                <th>Book Genre</th>
                <th>Price</th>
                <th>Stock Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->Product_ID }}</td>
                <td>{{ $product->Product_Name }}</td>
                <td>{{ $product->Author_Name }}</td>
                <td>{{ $product->Book_Genre }}</td>
                <td>{{ $product->Price }}</td>
                <td class="
                    @if($product->productstatus->Stock_Status === 'Out of Stock')
                        out-of-stock
                    @elseif($product->productstatus->Stock_Status === 'Low Stock')
                        low-stock
                    @else
                        in-stock
                    @endif
                ">
                    {{ $product->Stock_Level }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
