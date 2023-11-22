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
    <nav class="navbar navbar-expand-lg">
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
                    <a class="nav-link" href="login">Log In/Sign In</a>
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
                        <a href="/search?genre=Fiction">Fiction</a>
                        <a href="/search?genre=Non-fiction">Non-fiction</a>
                        <a href="/search?genre=Science Fiction">Science Fiction</a>
                        <a href="/search?genre=Mystery">Mystery</a>
                        <a href="/search?genre=Historical">Historical</a>
                        <a href="/search?genre=Thriller">Thriller</a>
                        <a href="/search?genre=Romance">Romance</a>
                        <a href="/search?genre=Young Adult">Young Adult</a>
                        <a href="/search?genre=Fantasy">Fantasy</a>
                        <a href="/search?genre=Children">Children</a>
                        <a href="/search?genre=Biography">Biography</a>
                        <a href="/search?genre=Adventure">Adventure</a>
                        <a href="/search?genre=True Crime">True Crime</a>
                        <a href="/search?genre=Horror">Horror</a>
                    </div>
                    <div class="filter-category">
                        <h6>Category</h6>
                        <a href="/search">All</a>
                        <a href="/search?category=1">General</a>
                        <a href="/search?category=2">Best Sellers</a>
                        <a href="/search?category=3">New Books</a>
                        <a href="/search?category=4">Classics</a>
                        <a href="/search?category=5">Recommended</a>
                        <a href="/search?category=6">Books For Children</a>
                        <a href="/search?category=7">Books For Young Adults</a>
                        <a href="/search?category=8">Historical Period</a>
                    </div>
                    <div class="filter-category">
                        <h6>Book Type</h6>
                        <a href="/search?type=Paperback">Paperbacks</a>
                        <a href="/search?type=Hardback">Hardbacks</a>
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
        <h6>&copy; 2023 Books4U Bookstore. All rights reserved.</h6>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
