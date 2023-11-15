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
    <!-- Display login flash Message -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <header>
        <h1>Books4U Bookstore</h1>
    </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Books4U</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Home.blade.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.blade.html">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.blade.html">Log In/Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-cart" href="Basket.blade.html">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Search Bar -->
    <form action="/search" class="search-form">
        <div class="search-container">
            <input type="text" name="search" class="search-input" placeholder="Search Books4U..." />
            <div class="search-button-container">
                <button type="submit" class="search-button">Search</button>
            </div>
        </div>
        <div class="filter-link">Filter
            <div class="filter-dropdown">
                <div class="filter-categories">
                    <div class="filter-category">
                        <h6>Genre</h6>
                        <a href="/search">Fiction</a>
                        <a href="/search">Non-fiction</a>
                        <a href="/search">Science Fiction</a>
                        <a href="/search">Mystery</a>
                        <a href="/search">Historical</a>
                        <a href="/search">Thriller</a>
                        <a href="/search">Romance</a>
                        <a href="/search">Young Adult</a>
                        <a href="/search">Fantasy</a>
                        <a href="/search">Children</a>
                        <a href="/search">Biography</a>
                        <a href="/search">Adventure</a>
                        <a href="/search">True Crime</a>
                        <a href="/search">Horror</a>
                    </div>
                    <div class="filter-category">
                        <h6>Category</h6>
                        <a href="/search">All</a>
                        <a href="/search">General</a>
                        <a href="/search">Best Sellers</a>
                        <a href="/search">New Books</a>
                        <a href="/search">Classics</a>
                        <a href="/search">Recommended</a>
                        <a href="/search">Books For Children</a>
                        <a href="/search">Books For Young Adults</a>
                        <a href="/search">Historical Period</a>
                    </div>
                    <div class="filter-category">
                        <h6>Book Type</h6>
                        <a href="/search">Paperbacks</a>
                        <a href="/search">Hardbacks</a>
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
    </section>
    
    <!-- Footer -->
    <section class="footer">
        <h6>&copy; 2023 Books4U Bookstore. All rights reserved.</h6>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
