<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link href="{{ asset('css/update.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
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

<br><br>

<h1 class="title">Update customer</h1>

<section class="update" id="update">
    
    
    <form method="POST" class="update-form" action="{{ route('update-customer', ['id' => $customer->Customer_ID]) }}">
        @csrf
        @method('PUT')
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $customer->First_Name }}" class="text-box" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $customer->Last_Name }}" class="text-box" required>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $customer->Address }}" class="text-box" >
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $customer->Phone_Number }}" class="text-box">

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->Email }}" class="text-box" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="{{ $user->Username }}" class="text-box" required>
        
        <button type="submit" class="btn">Update</button>
    </form>
        
</section>


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

