<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link href="{{ asset('css/singleBookStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
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
        <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
        <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
        <a href="{{ route('basket') }}"><i class="fas fa-shopping-basket"></i> Basket</a>
        <a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
        
        @if(Auth::check() && Auth::user()->User_Type === 'Admin')
            <a href="{{ route('create') }}"><i class="fas fa-plus"></i> Create</a>
            <a href="{{ route('search') }}"><i class="fas fa-search"></i> Search</a>
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

<div class="book-container" data-stock-level="{{ $book->Stock_Level }}" data-threshold="{{ $book->productStatus->Threshold }}">
<div class="book-image-container">
        <img class="book-image" src="{{ $book->productImages->first() ? asset('storage/' . $book->productImages->first()->Image_URL) : asset('/images/no-image.png') }}" alt="" />
    </div>
    <div class="book-details">
        <div id="stock-message" class="stock-message"></div>
        <h2>{{$book['Product_Name']}}</h2>
        <h3>{{$book['Author_Name']}}</h3>
        <div class="book-description">
            <p>{{$book['Description']}}</p>
        </div>
        <div class="book-price">
            <p>{{$book['Price']}}</p>
        </div>
        <p class="stock-status">
            {{ $book->productStatus->Stock_Status ?? 'Not Available' }} | {{ $book->Stock_Level ?? 'Not Available' }} Available
        </p>
        <form method="POST" action="{{url('addToBasket', $book->Product_ID)}}">
            @csrf
            <div class="quantity-basket">
                <div class="quantity-box">
                    <label for="book-quantity">Quantity:</label>
                    <select id="book-quantity" name="quantityBox">
                        @for ($i = 1; $i <= $book->Stock_Level; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>   
                <br><br>
                <button class="basket" type="submit">Add to Basket</button>
            </div>
        </form>
        <form method="POST" action="{{url('addToWishlist', $book->Product_ID)}}">
            @csrf
            <button class="wishlist" type="submit">Add to Wishlist</button>
        </form>
        @if(Auth::check() && Auth::user()->User_Type === 'Admin')
            <h3><a href="/book/{{$book->Product_ID}}/edit">Edit</a></h3>
            <form method="POST" action="/book/{{$book->Product_ID}}">
                @csrf
                @method('DELETE')
                <button class="delete-button" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
            </form>
        @endif  
    </div>
</div>

<div class="comment-section">
    <h2>Comments</h2>
    @auth
        <form method="POST" action="{{ route('comments.store', $book->Product_ID) }}">
            @csrf
            <label for="comment_text">Add a comment:</label>
            <textarea name="comment_text" id="comment_text" rows="4" cols="50"></textarea>
            <button type="submit">Submit</button>
        </form>
    @else
        <p>Please log in to leave a comment.</p>
    @endauth
    @foreach($comments as $comment)
        @include('partials.comment', ['comment' => $comment, 'bookId' => $book->Product_ID])
    @endforeach
</div>

<h3 class="recommended-header">You may also be interested in..</h3>
<section class="recommended-book-categories">
    <div class="recommended-book-category">
        <div class="recommended-book-genre-container">
            @if(count($recommendedBooks) == 0)
                <p>No Recommended Books found</p>
            @endif
            @foreach($recommendedBooks as $book)
                <div class="recommended-book-container">
                    <a href="/book/{{$book['Product_ID']}}">
                        <img class="recommended-book-image" src="{{ $book->productImages->first() ? asset('storage/' . $book->productImages->first()->Image_URL) : asset('/images/no-image.png') }}" alt="" />
                        <div>
                            <h3 class="recommended-book-title">
                                <a href="/book/{{$book['Product_ID']}}"> {{$book->Product_Name}} </a>
                            </h3>
                            <div class="recommended-book-author">
                                <a href="/search/?author={{ urlencode($book->Author_Name) }}"> {{$book->Author_Name}} </a>
                            </div>
                            <div class="recommended-book-price">{{$book->Price}}</div>
                            <div class="recommended-book-type">{{$book->Book_Type}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

</body>
</html>
