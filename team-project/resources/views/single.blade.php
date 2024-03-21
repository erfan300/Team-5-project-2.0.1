<!-- single.blade.php -->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/single.css" />
    <link href="{{ asset('css/single.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script defer src="js/main.js"></script>
</head>

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


<section id="customer-details" class="container mt-5">
    <header>
        <h2>Customer Details</h2>
    </header>

    <ul>
        <div class="info">
            <h3>ID: {{ $customer->Customer_ID }}</h3>
            <h3>First Name: {{ $customer->First_Name }}</h3>
            <h3>Last Name: {{ $customer->Last_Name }}</h3>
            <h3>Address: {{ $customer->Address }}</h3>
            <h3>Phone Number: {{ $customer->Phone_Number }}</h3>
        
            @if(isset($user))
                <h3>Username: {{ $user->Username }}</h3>
                <h3>Email: {{ $user->Email }}</h3>
                @endif
        </div>
    </ul>
</section>
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
                <h4>Quick Links</h4>
                <a href="about"><i class="fas fa-info-circle"></i> About</a>
                <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
                <a href="home"><i class="fas fa-home"></i> Home</a>
                <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
                <a href="register"><i class="fas fa-user-plus"></i> Register</a>
            </div>
            <div class="footer-section contact-form">
                <h4>Contact Us</h4>
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