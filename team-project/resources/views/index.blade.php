<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U Bookstore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #495057;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav {
            background-color: #495057;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #17a2b8;
        }

        .search-form {
            text-align: center;
            margin-top: 20px;
        }

        .search-container {
            display: flex;
        }

        .search-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-button-container {
            margin-left: 10px;
        }

        .book-categories {
            margin-top: 40px;
        }

        .book-category {
            margin-bottom: 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .book-category h3 {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            margin: 0;
        }

        .book-genre-container {
            padding: 20px;
        }

        .book-genre-container p {
            margin: 0;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }

        .nav-link-cart {
            display: flex;
            align-items: center;
            color: #17a2b8;
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

        @keyframes fade {
            from {
                opacity: 0.4;
            }
            to {
                opacity: 1;
            }
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
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
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- Slideshow -->
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="C:/Users/Raihan/Documents/GitHub/eam-5-project-2.0.1/team-project/public/images/new/slide1.jpg" alt="Slide 1">
        </div>
        <div class="mySlides">
            <img src="path/to/slide2.jpg" alt="Slide 2">
        </div>
        <div class="mySlides">
            <img src="path/to/slide3.jpg" alt="Slide 3">
        </div>
    </div>
    <script>
        let slideIndex = 0;

        function showSlides() {
            let i;
            const slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 4000); // Change slide every 4 seconds
        }

        document.addEventListener("DOMContentLoaded", function () {
            showSlides();
        });
    </script>

    <!-- Book Selection -->
    <section class="book-categories">
        <div class="book-category">
            <h3>BEST SELLERS</h3>
            <div class="book-genre-container">
                @if(count($bestSellers) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($bestSellers as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>
        <div class="book-category">
            <h3>Fiction</h3>
            <div class="book-genre-container">
                @if(count($fiction) == 0)
                    <p>No Books found</p>
                @endif
                @foreach($fiction as $book)
                    <x-book-card :book="$book"/>
                @endforeach
            </div>
        </div>    
        <h3>GENRES</h3>
        <div class="genre-container">
            <img src="Image/BLANK.PNG" alt="Genre 1" title="Genre 1">
            <img src="Image/BLANK.PNG" alt="Genre 2" title="Genre 2">
            <img src="Image/BLANK.PNG" alt="Genre 3" title="Genre 3">
            <img src="Image/BLANK.PNG" alt="Genre 4" title="Genre 4">
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
