<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" type="text/css" href="css/wishlist.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script defer src="js/main.js"></script>
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
    <a href="{{ route('search') }}"><i class="fas fa-search"></i> Search</a>
    
    @if(Auth::check() && Auth::user()->User_Type === 'Admin')
        <a href="{{ route('create') }}"><i class="fas fa-plus"></i> Create</a>
        <a href="{{ route('list') }}"><i class="fas fa-list"></i> List</a>
        <a href="{{ route('order-report') }}"><i class="far fa-file-alt"></i> Order Reports</a>
        <a href="{{ route('product-report') }}"><i class="far fa-file-alt"></i> Product Report</a>
        <a href="{{ route('discountpage') }}"><i class="fas fa-tags"></i> Discount Page</a>
    @endif
    
    <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
    <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
</nav>
    <section id="wishlist" class="container mt-5">
        <header>
            <h2>{{ auth()->user()->Username }}'s Wishlist</h2>
        </header>
        <div>
            <table class="table">
                <tr>
                    <th><h3>Book Cover</h3></th>
                    <th><h3>Book title</h3></th>
                    <th></th>
                </tr>
                @if(count($wishlist) == 0)
                    <tr><td colspan="3"><h4>Wishlist is Empty!</h4></td></tr>
                @else
                    @foreach ($wishlist as $wishlistItem)
                    <tr>
                        <td>
                            @if ($wishlistItem->product->productImages->first())
                                <a href="{{ url('/book/' . $wishlistItem->product->Product_ID) }}"><img src="{{ asset('storage/' . $wishlistItem->product->productImages->first()->Image_URL) }}" alt="Product Image" width="150" height="200"></a>
                            @else
                                <img src="{{ asset('/images/no-image.png') }}" alt="No Image" width="50" height="50">
                            @endif
                        </td>
                        <td><a href="{{ url('/book/' . $wishlistItem->product->Product_ID) }}">{{ $wishlistItem->product->Product_Name }}</a></td>
                        <td>
                            <a class="removeButton" onclick="return confirm('Are you sure you want to remove?')" href="{{ url('/removeFromWishlist', $wishlistItem->Wishlist_ID) }}">Remove</a>
                        </td>
                        
                    </tr>
                    @endforeach
                @endif
            </table>    
        </div>
    </section>
      <!-- Footer -->
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
                <form class="small-contact" action="{{ route('save.contact') }}" method="post">
                    @csrf
                
                    <input type="text" name="Name" class="contact-text-box" placeholder="Your Name" required>
                    <input type="email" name="Email" class="contact-text-box" placeholder="Your Email" required>
                    <input type="text" name="Subject" class="contact-subject-box" placeholder="Subject" required>
                    <textarea name="Message" class="contact-text-area" rows="5" placeholder="Your message" required></textarea>
                    <input type="submit" class="contact-send-btn" value="Send" name="send">
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