<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="{{ asset('css/createStyle.css') }}" rel="stylesheet">
    <link rel="icon" href="" type="">
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
        @endif
        
        <a href="{{ route('about') }}"><i class="fas fa-info-circle"></i> About</a>
        <a href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
    </nav>
    

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    
</header>
    <section class="form-section">
        <h1 class="book-title-edit">Edit: {{$book->Product_Name}} </h1>
        <form action="{{ route('book.update', ['book' => $book->Product_ID]) }}" method="POST" class="book-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Product_Name">Book Name</label>
                <input type="text" name="Product_Name" class="form-control" value="{{$book->Product_Name}}"/>
                @error('Product_Name')
                    <p class="product-name-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="Description" rows="5" class="form-control">{{$book->Description}}</textarea>
                @error('Description')
                    <p class="description-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" name="Price" step="0.01" class="form-control" value="{{$book->Price}}"/>
                @error('Price')
                    <p class="price-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Stock_Level">Stock Level</label>
                <input type="number" name="Stock_Level" class="form-control" value="{{$book->Stock_Level}}"/>
                @error('Stock_Level')
                    <p class="stock-level-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Author_Name">Author Name</label>
                <input type="text" name="Author_Name" class="form-control" value="{{$book->Author_Name}}"/>
                @error('Author_Name')
                    <p class="author-name-error">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="Book_Image">Book Cover</label>
                <input type="file" name="Book_Image" class="form-control"/>
                <!-- This is to show the image that was selected -->
                <img class="book-image" style="max-width: 200px; max-height: 200px;" src="{{ $book->productImages->first() ? asset('storage/' . $book->productImages->first()->Image_URL) : asset('/images/no-image.png') }}" alt="" />

                @error('Book_Image')
                    <p class="book-image-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Book_Type">Book Type</label>
                <select name="Book_Type" class="form-control">
                    <option value="" disabled>Select Book Type</option>
                    <option value="Hardback" {{$book->Book_Type == 'Hardback' ? 'selected' : ''}}>Hardback</option>
                    <option value="Paperback" {{$book->Book_Type == 'Paperback' ? 'selected' : ''}}>Paperback</option>
                </select>
                
                @error('Book_Type')
                    <p class="book-type-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Book_Genre">Book Genre</label>
                <select name="Book_Genre" class="form-control">
                    <option value="" disabled>Select Book Genre</option>
                    <option value="Fiction" {{$book->Book_Genre == 'Fiction' ? 'selected' : ''}}>Fiction</option>
                    <option value="Non-fiction" {{$book->Book_Genre == 'Non-fiction' ? 'selected' : ''}}>Non-fiction</option>
                    <option value="Science Fiction" {{$book->Book_Genre == 'Science Fiction' ? 'selected' : ''}}>Science Fiction</option>
                    <option value="Mystery" {{$book->Book_Genre == 'Mystery' ? 'selected' : ''}}>Mystery</option>
                    <option value="Historical" {{$book->Book_Genre == 'Historical' ? 'selected' : ''}}>Historical</option>
                    <option value="Thriller" {{$book->Book_Genre == 'Thriller' ? 'selected' : ''}}>Thriller</option>
                    <option value="Romance" {{$book->Book_Genre == 'Romance' ? 'selected' : ''}}>Romance</option>
                    <option value="Young Adult" {{$book->Book_Genre == 'Young Adult' ? 'selected' : ''}}>Young Adult</option>
                    <option value="Fantasy" {{$book->Book_Genre == 'Fantasy' ? 'selected' : ''}}>Fantasy</option>
                    <option value="Children" {{$book->Book_Genre == 'Children' ? 'selected' : ''}}>Children</option>
                    <option value="Biography" {{$book->Book_Genre == 'Biography' ? 'selected' : ''}}>Biography</option>
                    <option value="Adventure" {{$book->Book_Genre == 'Adventure' ? 'selected' : ''}}>Adventure</option>
                    <option value="True Crime" {{$book->Book_Genre == 'True Crime' ? 'selected' : ''}}>True Crime</option>
                    <option value="Horror" {{$book->Book_Genre == 'Horror' ? 'selected' : ''}}>Horror</option>
                </select>
                
                @error('Book_Genre')
                    <p class="book-genre-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="Category_ID">Category Name</label>
                <select name="Category_ID" class="form-control">
                    <option value="" disabled>Select Category Name</option>
                    <option value="1" {{$book->Category_ID == 1 ? 'selected' : ''}}>General</option>
                    <option value="2" {{$book->Category_ID == 2 ? 'selected' : ''}}>Best Sellers</option>
                    <option value="3" {{$book->Category_ID == 3 ? 'selected' : ''}}>New Books</option>
                    <option value="4" {{$book->Category_ID == 4 ? 'selected' : ''}}>Classics</option>
                    <option value="5" {{$book->Category_ID == 5 ? 'selected' : ''}}>Recommended</option>
                    <option value="6" {{$book->Category_ID == 6 ? 'selected' : ''}}>Books For Children</option>
                    <option value="7" {{$book->Category_ID == 7 ? 'selected' : ''}}>Books For Young Adults</option>
                    <option value="8" {{$book->Category_ID == 8 ? 'selected' : ''}}>Historical Period</option>
                </select>
                
                @error('Category_ID')
                    <p class="category-name-error">{{$message}}</p>
                @enderror
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn-submit">Edit Book</button>
                <a href="/book/{{$book->Product_ID}}" class="btn-back">Back</a>
            </div>
        </form>
                
    </section>
    
</body>
</html>
