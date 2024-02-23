<!DOCTYPE html>
<html>
<head>
    <title>Product Report</title>
    <link href="{{ asset('css/productReport.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
    <h1>Product Report</h1>
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
    
        @endif
        
        <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
        <a href="register"><i class="fas fa-user-plus"></i> Register</a>
        <a href="about"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
    </nav>
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
