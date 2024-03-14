<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="{{ asset('css/pass.css') }}" rel="stylesheet">
    <script defer src="js/main.js"></script>
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
<body>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="wrapper">
        <div class="form-box password">
        <h2><span>Change Password</span></h2>
            <form method="POST" action="/change-password">
                @csrf

                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="new_password" required>
                    <label>New Password</label>
                </div>

                <div class="input-box">
                    <input type="password" name="new_password_confirmation" required>
                    <label>Confirm New Password</label>
                </div>

                <button type="submit" class="btn">Change Password</button>
                <div class="remember-text">
                <p style="color: black;">Remember your password?  <a href="login" class="forgot-link">Login</a></p>

                  </div>
                </div>
            </form>
        </div>
    </div>
</body>


<!-- Footer -->
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
  </body>
</html>

