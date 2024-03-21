<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U Bookstore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/basket.css') }}" rel="stylesheet">
    <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body>
<header>
    <div class="top-left">
        <div class="login-buttons">
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Log In</a>
            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
            @auth
                <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
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
            <form class="inLine" method="POST" action="{{ route('logout') }}">
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
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
    <a href="{{ route('basket') }}"><i class="fas fa-shopping-basket"></i> Basket</a>
    <a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
    <a href="{{ route('forum') }}"><i class="fa fa-list-alt"></i> Forums</a>
    
    @if(Auth::check() && Auth::user()->User_Type === 'Admin')
        <a href="{{ route('create') }}"><i class="fas fa-plus"></i> Create</a>
        <a href="{{ route('search') }}"><i class="fas fa-search"></i> Search</a>
        <a href="{{ route('list') }}"><i class="fas fa-list"></i> List</a>
        <a href="{{ route('order-report') }}"><i class="far fa-file-alt"></i> Order Reports</a>
        <a href="{{ route('product-report') }}"><i class="far fa-file-alt"></i> Product Report</a>
        <a href="{{ route('discountpage') }}"><i class="fas fa-tags"></i> Discount Page</a>
    @endif
    
    <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
    <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
</nav>

<section id="shopping-basket" class="container mt-5">
    <h2>Shopping Basket</h2>
    <br>
    <div class="discount">
        <form method="POST" action="{{ route('apply-discount') }}">
            @csrf
            <label for="discount_code">Discount Code:</label>
            <input type="text" name="discount_code">
            <button type="submit">Apply Discount</button>
        </form>
    </div>
    <div class="table-section">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Book title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(count($basket) == 0)
                    <tr><td colspan="5"><h5>Basket is Empty!</h5></td></tr>
                @endif
                <?php $totalPrice = 0; ?>
                @foreach ($basket as $basketItem)
                    <tr>
                        <td>
                            @if ($basketItem->product->productImages->first())
                                <img src="{{ asset('storage/' . $basketItem->product->productImages->first()->Image_URL) }}" alt="Product Image" width="150" height="200">
                            @else
                                <img src="{{ asset('/images/no-image.png') }}" alt="No Image" width="50" height="50">
                            @endif
                        </td>
                        <td>{{ $basketItem->product->Product_Name }}</td>
                        <td>
                            <form method="post" action="{{ url('/updateQuantity', $basketItem->Basket_ID) }}">
                                @csrf
                                <select name="quantity" onchange="this.form.submit()">
                                    @for ($i = 1; $i <= $basketItem->product->Stock_Level; $i++)
                                        <option value="{{ $i }}" @if($i == $basketItem->Quantity) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </form>
                        </td>
                        <td>
                            @if ($basketItem->DiscountCode_ID)
                                <span style="text-decoration: line-through;">£{{ number_format($basketItem->product->Price * $basketItem->Quantity, 2) }}</span><br>
                            @endif
                            <span style="color: red;">£{{ $basketItem->Price }}</span>
                        </td>
                        <td>
                            <a class="removeButton" onclick="return confirm('Are you sure you want to remove?')" href="{{url('/removeFromBasket', $basketItem->Basket_ID)}}">Remove</a>
                        </td>
                    </tr>
                    <?php $totalPrice = $totalPrice + $basketItem->Price ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total:</strong></td>
                    <td>
                        @if(count($basket) == 0)
                            £0
                        @else
                            <span style="color: red;">£{{ $totalPrice }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <input type="submit" value="Checkout" class="btn">
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<section class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h3>About Us</h3>
            <p>Welcome to Books4U, the place where the love for writing intertwines with the art of storytelling. We strongly believe in the transformative power of books, and their ability to greatly impact individuals, as well as communities. Our main purpose is to inspire, attract, and ignite the imaginations of the people who enjoy reading books.</p>
        </div>
        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <ul>
                <li><i class="fas fa-phone"></i> Phone: +44 0121 456 7894</li>
                <li><i class="fas fa-envelope"></i> Email: Books4U@gmail.com</li>
                <div class="social-media">
                    <a href="https://www.instagram.com/your_instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/your_facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/your_twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Books4U Bookstore. All rights reserved.
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
