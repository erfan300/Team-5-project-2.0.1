<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/aboutcss.css') }}" rel="stylesheet">
</head>


    
    

<body>
    
<!-- header section starts  -->

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
<!-- header section ends -->



<!-- about section starts  -->

<section class="about" id="about">
    <h1 class="heading">About Us</h1>
    <div class="box">
        <div class="content">
            <h3>Books4U</h3>            
            <p>Welcome to Books4U, the place where the love for writing intertwines with the art of storytelling. We strongly believe in the transformative power of books, and their ability to greatly impact individuals, as well as communities. Our main purpose is to inspire, attract, and ignite the imaginations of the people who enjoy reading books. </p>
            <p>At Books4U, we strive to be a guiding light for book lovers, connecting readers with narratives that leave a long-lasting impression.</p>
            <p>Through our carefully selected selection of books, we aim to create an mesmerizing and enriching reading experience that exceeds the boundaries. Whether you are in search of thrilling adventures, or heartwarming tales, Books4U is your trusted source.</p>
            <p>Your journey into the world of imagination begins here, at Books4U. Thank you.</p>
        </div>
    </div>
</section>

<!-- about section ends -->

<!-- more about section starts -->

<section class="about" id="about">
    <div class="box">
        <div class="content">
            <h3>Books4U</h3>
            <p>If you would like to get in contact with us, please click the "Contact" button in the navigation bar, which will redirect you to our contact page.<br><br>Fill out the contact form, and a member of our team will reach out to you within 24 hours. Thank you.</p>
        </div>
    </div>
    
</section>


<!-- more about section ends -->

          <!-- footer section starts  -->
          <section class="footer">
            <h6>&copy; 2023 Books4U Bookstore. All rights reserved.</h6>
        </section>

        <!-- footer section ends -->
</body>

</html>