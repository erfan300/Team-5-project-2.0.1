<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/search.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>Search Books | Book4U</title>
</head>
<body>
    <header>
        <h1>Books4U Bookstore</h1>
    </header>

    <!-- Navigation -->
    <nav>
        <a href="home"><i class="fas fa-home"></i> Home</a>
        <a href="profile"><i class="fas fa-user"></i> Profile</a>
        <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
        <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
        <a href="register"><i class="fas fa-user-plus"></i> Register</a>
        <a href="about"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
    </nav>
    <br><br>

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
    <div class="search-book-container">
        @if(count($books) == 0)
            <p> No Books found </p>
        @endif
        @foreach($books as $book)
            <x-book-card :book="$book"/>
        @endforeach
    </div>
    <div class="pagination-container"> 
        {{$books->appends(request()->query())->links()}} <!-- This is the button to show next page of books -->
    </div>
</body>
</html>

