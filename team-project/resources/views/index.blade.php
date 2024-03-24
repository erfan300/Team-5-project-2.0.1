<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U Bookstore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
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

    <!-- Search Bar -->
    <form action="{{ url('/search') }}" class="search-form">
        <div class="search-container">
            <input type="text" name="search" class="search-input" placeholder="Search Books4U..." />
            <div class="search-button-container">
                <button type="submit" class="search-button">Search</button>
            </div>
        </div>
        <div class="filter-link"><i class="fas fa-sort-amount-down"></i>
            <div class="filter-dropdown">
                <div class="filter-categories">
                    <div class="filter-category">
                        <h6>Genre</h6>
                        <a href="{{ url('/search?genre=Fiction') }}">Fiction</a>
                        <a href="{{ url('/search?genre=Non-fiction') }}">Non-fiction</a>
                        <a href="{{ url('/search?genre=Science Fiction') }}">Science Fiction</a>
                        <a href="{{ url('/search?genre=Mystery') }}">Mystery</a>
                        <a href="{{ url('/search?genre=Historical') }}">Historical</a>
                        <a href="{{ url('/search?genre=Thriller') }}">Thriller</a>
                        <a href="{{ url('/search?genre=Romance') }}">Romance</a>
                        <a href="{{ url('/search?genre=Young Adult') }}">Young Adult</a>
                        <a href="{{ url('/search?genre=Fantasy') }}">Fantasy</a>
                        <a href="{{ url('/search?genre=Children') }}">Children</a>
                        <a href="{{ url('/search?genre=Biography') }}">Biography</a>
                        <a href="{{ url('/search?genre=Adventure') }}">Adventure</a>
                        <a href="{{ url('/search?genre=True Crime') }}">True Crime</a>
                        <a href="{{ url('/search?genre=Horror') }}">Horror</a>
                    </div>
                    <div class="filter-category">
                        <h6>Category</h6>
                        <a href="{{ url('/search') }}">All</a>
                        <a href="{{ url('/search?category=1') }}">General</a>
                        <a href="{{ url('/search?category=2') }}">Best Sellers</a>
                        <a href="{{ url('/search?category=3') }}">New Books</a>
                        <a href="{{ url('/search?category=4') }}">Classics</a>
                        <a href="{{ url('/search?category=5') }}">Recommended</a>
                        <a href="{{ url('/search?category=6') }}">Books For Children</a>
                        <a href="{{ url('/search?category=7') }}">Books For Young Adults</a>
                        <a href="{{ url('/search?category=8') }}">Historical Period</a>
                    </div>
                    <div class="filter-category">
                        <h6>Book Type</h6>
                        <a href="{{ url('/search?type=Paperback') }}">Paperbacks</a>
                        <a href="{{ url('/search?type=Hardback') }}">Hardbacks</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Slideshow -->
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="{{ asset('images/slide_placeholder_1.png') }}" alt="Slide 1">
        </div>
        <div class="mySlides">
            <img src="{{ asset('images/slide_placeholder_2.png') }}" alt="Slide 2">
        </div>
        <div class="mySlides">
            <img src="{{ asset('images/slide_placeholder_3.jpg') }}" alt="Slide 3">
        </div>
    </div>

    <!-- Book Selection -->
    <section class="book-categories">
        <h3>BEST SELLERS</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($bestSellers) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($bestSellers as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>New Books</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($newBooks) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($newBooks as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>General</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($general) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($general as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>Classics</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($classics) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($classics as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>Recommended</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($recommended) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($recommended as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>Books For Children</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($booksForChildren) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($booksForChildren as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>Books For Young Adults</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($booksForYoungAdults) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($booksForYoungAdults as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <h3>Historical Period</h3>
        <div class="book-category">
            <div class="book-genre-container">
                @if(count($historicalPeriod) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($historicalPeriod as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>    
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

<style>

</style>
