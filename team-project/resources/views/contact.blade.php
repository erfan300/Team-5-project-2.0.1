<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
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
    <a href="forum"><i class="fa fa-list-alt"></i> Forums</a>
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


</section>

<div class="contact-section">
   <section class="contact-info">
     <div><i class="fas fa-map-marker-alt"></i>Aston University, Birmingham</div>
     <div><i class="fas fa-envelope"></i>info@books4u.com</div>
     <div><i class="fas fa-phone"></i>0121 204 3000</div>
   </section>


   <section class="contact-form">
     <h2>Books4U</h2>
     <form class="contact" action="{{ route('save.contact') }}" method="post">
     @csrf

<input type="text" name="Name" class="text-box" placeholder="Your Name" required>
<input type="email" name="Email" class="text-box" placeholder="Your Email" required>
<input type="text" name="Subject" class="subject-text-box" placeholder="Subject" required>
<textarea name="Message" rows="5" placeholder="Your message" required></textarea>
<input type="submit" class="send-btn" value="Send" name="send">
</form>
</section>
 </div>

 <div class="section-separator"></div>

 <section>
    <div class="FAQheader">
    <h1>Frequently Asked Questions</h1>
    </div>

<div class="faq-container">
    <div class="question" onclick="this.classList.toggle('active')">Do you offer gift wrapping services?</div>
    <div class="answer">
        At the moment, we do not offer any gift wrapping services, but we plan on doing so in the near future.
    </div>

    <div class="question" onclick="this.classList.toggle('active')">Do you sell new and used books?</div>
    <div class="answer">
        At the moment, we only sell brand new books, but in the future we will be looking to sell used books as well.
    </div>

    <div class="question" onclick="this.classList.toggle('active')">Can I cancel or modify my order after it has been placed?</div>
    <div class="answer">
        If you would like to cancel or modify your order, please contact us using the contact form and we will answer your request within 24 hours.
    </div>
    <div class="question" onclick="this.classList.toggle('active')">Can I pre-order upcoming book releases?</div>
    <div class="answer">
        At the moment you cannot pre-order upcoming books, but it is something that will be available at a later date.
    </div>
    <div class="question" onclick="this.classList.toggle('active')">How can I contact customer support?</div>
    <div class="answer">
        If you would like to contact customer support, please fill in the contact form and someone from our team will reach out within 24 hours.
    </div>
</div>
</section>
 <!--contact section end--> 

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

