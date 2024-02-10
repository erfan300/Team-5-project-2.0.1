<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U Bookstore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8iN17PdL7FJTZ5KvZxjKlTJlU6TAPjzl5FMITSOA2U5ZlEaAgFsn7bF" crossorigin="anonymous">
    <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body>
    <!-- Display login flash Message -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="top-right">
        <div class="login-buttons">
            <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
            <a href="register"><i class="fas fa-user-plus"></i> Register</a>
            @auth
                <a href="profile"><i class="fas fa-user"></i> Profile</a>
            @endauth
        </div>
    </div>

    <header>
        <h1>Books4U Bookstore</h1>
        @auth
            <div class="log-out-box">
                <span>Welcome {{ auth()->user()->Username }}</span>
                <form class="inLine" method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        @endauth
    </header>

    <nav>
        <a href="home"><i class="fas fa-home"></i> Home</a>
        <a href="profile"><i class="fas fa-user"></i> Profile</a>
        <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
        <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
        
        @if(Auth::check() && Auth::user()->User_Type === 'Admin')
            <a href="create"><i class="fas fa-plus"></i> Create</a>
            <a href="search"><i class="fas fa-search"></i> Search</a>
            <a href="list"><i class="fas fa-list"></i> List</a>
            <a href="{{ route('order-report') }}"><i class="far fa-file-alt"></i> Order Reports</a>
        @endif
        
        <a href="about"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
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


<style>
:root {
    --primary-color: #283747; /* Dark blue-gray */
    --secondary-color: #f5f5f5; /* Light gray */
    --accent-color: #2980b9; /* Blue */
    --text-color: #34495e; /* Dark gray */
    --link-color: #2980b9; /* Blue */
    --button-color: #283747; /* Blue */
}

.alert-success {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: var(--accent-color);
    color: white;
    padding: 15px;
    margin-bottom: 20px;
    text-align: center;
    z-index: 1000;
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

.alert-success.fade-out {
    animation: fadeOut 2s ease-out;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: var(--secondary-color);
    color: var(--text-color);
}

.top-right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    background-color: var(--primary-color);
    padding: 10px;
}

.top-right .login-buttons {
    margin-left: auto;
}

.top-right .login-buttons a {
    color: var(--secondary-color);
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid var(--secondary-color);
    border-radius: 5px;
    transition: background-color 0.3s;
}

.top-right .login-buttons a:hover {
    background-color: var(--accent-color);
    color: var(--secondary-color);
}

header {
    background-color: var(--primary-color);
    color: var(--secondary-color);
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

nav {
    background-color: var(--primary-color);
    overflow: hidden;
    text-align: center;
}

nav a {
    display: inline-block;
    color: var(--secondary-color);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

nav a:hover {
    background-color: var(--accent-color);
    color: var(--secondary-color);
}

nav a.active {
    background-color: var(--accent-color);
    color: var(--secondary-color);
}

nav a:last-child {
    border-right: none;
}

@media screen and (max-width: 600px) {
    nav a {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
}

.search-form {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
}

.search-container {
    position: relative;
    display: flex;
    background-color: var(--primary-color);
    border: 2px solid var(--text-color);
    border-radius: 5px;
    overflow: hidden;
    width: 70%;
}

.search-input {
    flex: 1;
    padding: 10px;
    border: none;
    outline: none;
    font-size: 16px;
    width: 90%;
    background-color: #fff; 
    color: var(--text-color);
}

.search-button {
    padding: 10px 20px;
    background-color: var(--accent-color);
    color: #fff; 
    border: none;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 16px;
}

.search-button:hover {
    background-color: #283747; 
}

.main-content {
    padding: 20px;
}

.filter-dropdown {
    display: none;
    position: absolute;
    background-color: var(--secondary-color);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    padding: 20px;
    z-index: 1;
    right: 0;
    min-width: 370px;
}

.filter-categories {
    display: flex;
    flex-direction: row;
}

.filter-category {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

.filter-category h6 {
    margin-bottom: 8px;
    color: var(--text-color);
}

.filter-link:hover .filter-dropdown {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    visibility: visible;
}

.filter-category a {
    display: block;
    text-decoration: none;
    color: var(--text-color);
    margin-right: 10px;
}

.filter-category a:hover {
    background-color: #ddd;
}

.filter-link {
    margin-left: 10px;
    cursor: pointer;
    text-decoration: underline;
    position: relative;
}

.filter-link:hover .filter-dropdown {
    display: flex;
    flex-direction: row;
    visibility: visible;
}

.filter-dropdown a {
    display: block;
    padding: 1px;
    text-decoration: none;
    color: var(--text-color);
    max-width: 100px;
}

.filter-dropdown a:hover {
    background-color: #ddd;
}

.footer {
    text-align: center;
    margin-top: 40px;
    background-color: var(--primary-color);
    color: var(--secondary-color);
    padding: 20px;
}

.nav-link-cart {
    display: flex;
    align-items: center;
    color: var(--link-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.nav-link-cart i {
    margin-right: 5px;
}

.slideshow-container {
    max-width: 1000px;
    margin: auto;
    margin-bottom: 40px;
    overflow: hidden;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.mySlides {
    display: none;
    animation: fade 4s ease-in-out infinite;
}

img {
    width: 50%;
    height: auto;
    border-radius: 5px;
    display: block;
    margin: 0 auto;
}

.book-category {
    color: rgb(128, 128, 128);
    border: solid rgb(192, 189, 189);
    display: flex;
    justify-content: center;
    padding-top: 10px;
}

.book-genre-container {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.book-container {
    text-align: center;
    margin: 0 10px;
    width: 150px;
    height: 300px;
}

.search-book-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: stretch;
    margin: 10px;
    padding: 10px;
}

.book-image {
    width: 100px;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
    display: block;
    margin: 0 auto;
}

.book-title a {
    font-size: 0.7em;
    color: var(--text-color);
    margin: 10px 0;
}

.book-author a {
    font-size: 1em;
    color: #8e44ad; 
}

.book-price {
    font-size: 1.1em;
    color: var(--text-color);
}

.book-type {
    font-size: 0.9em;
    color: var(--text-color);
}

.pagination-container nav {
    text-align: center;
    margin-top: 20px;
    background-color: var(--secondary-color);
    color: var(--text-color);
}

.pagination {
    display: flex;
    justify-content: center;
    padding: 4px 8px;
    margin: 0;
    border-radius: 4px;
    background-color: var(--secondary-color);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 8px 12px;
    margin: 0 4px;
    text-decoration: none;
    color: var(--text-color);
    background-color: var(--secondary-color);
    border: 1px solid var(--text-color);
    border-radius: 4px;
    cursor: pointer;
}

.pagination a:hover {
    background-color: #bdc3c7; 
}

.pagination .active {
    color: var(--accent-color);
}
</style>