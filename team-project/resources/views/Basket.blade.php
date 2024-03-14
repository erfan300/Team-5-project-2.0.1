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


<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/basket.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script src="{{ asset('js/custom.js') }}"></script>
</head>

<body>
   
 Display login flash Message 
@if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <header>
        <h1>Books4U</h1>
        @auth
            <div class="log-out-box">
                <span>Welcome {{ auth()->user()->Username }}</span>
                <form class="inLine" method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        @endauth
    </header>

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
        
        <a href="about"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
    </nav>
     
-->


    <!-- Shopping Basket -->

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
    <div>
        <table class="table">
            <tr>
                <th></th>
                <th>Book title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
            </tr>
            @if(count($basket) == 0)
                <p><h5>Basket is Empty!<h5></p>
            @endif
            <?php $totalPrice = 0; ?>
            @foreach ($basket as $basketItem)
            <tr>
                <th>
                    @if ($basketItem->product->productImages->first())
                        <img src="{{ asset('storage/' . $basketItem->product->productImages->first()->Image_URL) }}" alt="Product Image" width="150" height="200">
                    @else
                    <img src="{{ asset('/images/no-image.png') }}" alt="No Image" width="50" height="50">
                    @endif
                </th>
                <th>{{ $basketItem->product->Product_Name }}</th>
                <th>
                    <form method="post" action="{{ url('/updateQuantity', $basketItem->Basket_ID) }}">
                        @csrf
                        <select name="quantity" onchange="this.form.submit()">
                            @for ($i = 1; $i <= $basketItem->product->Stock_Level; $i++)
                                <option value="{{ $i }}" @if($i == $basketItem->Quantity) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </form>
                </th>
                <th>
                    @if ($basketItem->DiscountCode_ID)
                        <span style="text-decoration: line-through;">
                            £{{ number_format($basketItem->product->Price * $basketItem->Quantity, 2) }}
                        </span><br>
                    @endif

                    <span style="color: red;">£{{ $basketItem->Price}}</span>
                </th>
                <th><a class="removeButton" onclick="return confirm('Are you sure you want to remove?')" href="{{url('/removeFromBasket', $basketItem->Basket_ID)}}">Remove</th>
            </tr>
            <?php $totalPrice = $totalPrice + $basketItem->Price ?>
        @endforeach
        
            

            <div class="total-price">
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><strong>Total:</strong></td>
                        @if(count($basket) == 0)
                            <td>£0</td>
                        @else
                            <td><span style="color: red;">£{{ $totalPrice }}</span></td>
                        @endif
                        
                        <br>
                    </tr>
                    <div class="checkout-button">
            <a href="{{ route('payment-page') }}" class="btn btn-success">Checkout</a>
        </div>
                </tfoot>
            </div>
        </table>    
    </div>
    
</section>

<!-- FOOTER -->
<section class="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Welcome to Books4U, the place where the love for writing intertwines with the art of storytelling. We strongly believe in the transformative power of books, and their ability to greatly impact individuals, as well as communities. Our main purpose is to inspire, attract, and ignite the imaginations of the people who enjoy reading books.</p>
                <section class="footer-section contact">
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
</section>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <a href="about"><i class="fas fa-info-circle"></i> About</a>
                <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
                <a href="home"><i class="fas fa-home"></i> Home</a>
                <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
                <a href="register"><i class="fas fa-user-plus"></i> Register</a>
            </div>
            <div class="footer-section contact-form">
                <h3>Contact Us</h3>
                <form action="#" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                    <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        Send
                    </button>
                </form>
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