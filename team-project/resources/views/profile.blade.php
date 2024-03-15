<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
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

<br><br>

<h1 class="title">Profile</h1>

<main>
    <!-- The profile update form (fully working)-->
   
    <form method="POST" class="profile-form" action="{{ route('update-profile') }}">
        @csrf
        <label for="username">Username:</label>
        @error('username')
        <p class="username-error">{{$message}}</p>
        @enderror
        <input type="text" name="username" value="{{ $user->Username }}" required>

        <label for="first_name">First Name:</label>
        @error('first_name')
        <p class="first-name-error">{{$message}}</p>
        @enderror
        <input type="text" name="first_name" value="{{ $relatedModel ? $relatedModel->First_Name : '' }}" required>

        <label for="last_name">Last Name:</label>
        @error('last_name')
        <p class="last-name-error">{{$message}}</p>
        @enderror
        <input type="text" name="last_name" value="{{ $relatedModel ? $relatedModel->Last_Name : '' }}" required>

        <label for="email">Email:</label>
        @error('email')
        <p class="email-error">{{$message}}</p>
        @enderror
        <input type="email" name="email" value="{{ $user->Email }}" required>

        <label for="phone_number" name="phone_number">Phone Number:</label>
        @error('phone_number')
        <p class="phone-number-error">{{$message}}</p>
        @enderror
        <input type="text" name="phone_number" value="{{ $relatedModel ? $relatedModel->Phone_Number : '' }}">

        <label for="address">Address:</label>
        @error('address')
        <p class="address-error">{{$message}}</p>
        @enderror
        <input type="text" name="address" value="{{ $relatedModel ? $relatedModel->Address : '' }}">

        <button type="submit" class="updatebtn" >Update Profile</button>
    </form>

    <section class="previous-orders">
    <h1 class="title">Previous orders</h1>
<a href="{{ route('profile.previous-orders') }}" class="button-style">Click Here To View Your Previous Orders</a>
</section>
</main>
</body>
 <!-- Footer -->
 <body>
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

</body>
</html>
