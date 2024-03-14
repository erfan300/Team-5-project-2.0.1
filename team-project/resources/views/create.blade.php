<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/createStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>Add Book to Database</title>
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
<br>
<h2> Create </h2>

    <section class="form-section">
        <!-- The create book form (fully working)-->
        <form action="/store" method="POST" class="book-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Product_Name">Book Name</label>
                <input type="text" name="Product_Name" class="form-control" required/>
                @error('Product_Name')
                    <p class="product-name-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="Description" rows="5" class="form-control"></textarea>
                @error('Description')
                    <p class="description-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" name="Price" step="0.01" class="form-control" required/>
                @error('Price')
                    <p class="price-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Stock_Level">Stock Level</label>
                <input type="number" name="Stock_Level" class="form-control" required/>
                @error('Stock_Level')
                    <p class="stock-level-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Author_Name">Author Name</label>
                <input type="text" name="Author_Name" class="form-control" required/>
                @error('Author_Name')
                    <p class="author-name-error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="Book_Image">Book Cover</label>
                <input type="file" name="Book_Image" class="form-control"/>
                @error('Book_Image')
                    <p class="book-image-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Book_Type">Book Type</label>
                <select name="Book_Type" class="form-control" required>
                    <option value="" selected disabled>Select Book Type</option>
                    <option value="Hardback">Hardback</option>
                    <option value="Paperback">Paperback</option>
                </select>
                @error('Book_Type')
                    <p class="book-type-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Book_Genre">Book Genre</label>
                <select name="Book_Genre" class="form-control" required>
                    <option value="" selected disabled>Select Book Genre</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-fiction">Non-fiction</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Historical">Historical</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Romance">Romance</option>
                    <option value="Young Adult">Young Adult</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Children">Children</option>
                    <option value="Biography">Biography</option>
                    <option value="Adventure">Adventure</option>
                    <option value="True Crime">True Crime</option>
                    <option value="Horror">Horror</option>
                </select>
                @error('Book_Genre')
                    <p class="book-genre-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Category_ID">Category Name</label>
                <select name="Category_ID" class="form-control" required>
                    <option value="" selected disabled>Select Category Name</option>
                    <option value="1">General</option> <!-- Makes book Category_ID = 1 -->
                    <option value="2">Best Sellers</option> <!-- Makes book Category_ID = 2 -->
                    <option value="3">New Books</option> <!-- Makes book Category_ID = 3 -->
                    <option value="4">Classics</option> <!-- Makes book Category_ID = 4 -->
                    <option value="5">Recommended</option> <!-- Makes book Category_ID = 5 -->
                    <option value="6">Books For Children</option> <!-- Makes book Category_ID = 6 -->
                    <option value="7">Books For Young Adults</option> <!-- Makes book Category_ID = 7 -->
                    <option value="8">Historical Period</option> <!-- Makes book Category_ID = 8 -->
                </select>
                @error('Category_ID')
                    <p class="category-name-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn-submit">Add Book</button>
                <a href="/" class="btn-back">Back</a>
            </div>
        </form>
                
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
