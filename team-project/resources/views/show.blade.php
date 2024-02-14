<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/singleBookStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script src="{{ asset('js/custom.js') }}"></script>
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
    <title>{{$book['Product_Name']}}</title>
</head>
<body>
<header>
        <h1>Books4U Bookstore</h1>
    </header>
    <nav>
        <a href="{{ url('home') }}"><i class="fas fa-home"></i> Home</a>
        <a href="{{ url('profile') }}"><i class="fas fa-user"></i> Profile</a>
        <a href="{{ url('basket') }}"><i class="fas fa-shopping-basket"></i> Basket</a>
        <a href="{{ url('wishlist') }}"><i class="fas fa-heart"></i> Wishlist</a>
        <a href="{{ url('login') }}"><i class="fas fa-sign-in-alt"></i> Log In</a>
        <a href="{{ url('register') }}"><i class="fas fa-user-plus"></i> Register</a>
        <a href="{{ url('about') }}"><i class="fas fa-info-circle"></i> About</a>
        <a href="{{ url('contact') }}"><i class="fas fa-envelope"></i> Contact</a>
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
               <h3> <p class="book-description">{{$book['Description']}}</p><h3>
            </div>
            <div class="book-price">
                <h3><p class="book-price">{{$book['Price']}}</p><h3>
            </div>
            <p class="stock-status">
                {{ $book->productStatus->Stock_Status ?? 'Not Available' }} | {{ $book->Stock_Level ?? 'Not Available' }} Available
            </p>
            <!-- The book show form (fully working)-->
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
                    <button class="basket"button type="submit">Add to Basket</button>
                </div>
            </form>
            <form method="POST" action="{{url('addToWishlist', $book->Product_ID)}}">
                @csrf
                <button class="wishlist" type="submit">Add to Wishlist</button>
            </form>
            
            @if(Auth::check() && Auth::user()->User_Type === 'Admin')
                    <h3><a href="/book/{{$book->Product_ID}}/edit">Edit</a><h3>
                    <form method="POST" action="/book/{{$book->Product_ID}}">
                        @csrf
                        @method('DELETE')
                        <button class="delete-button" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
            @endif  
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


    <!-- Recommended Books -->
    <h3 class="recommended-header">You may also be interested in..</h3>
    <section class="recommended-book-categories">
        <div class="recommended-book-category">
            <div class="recommended-book-genre-container">
                @if(count($recommendedBooks) == 0)
                    <p>No Recommended Books found</p>
                @endif
                @foreach($recommendedBooks as $book)
                <div class="recommended-book-container"><a href="/book/{{$book['Product_ID']}}">
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
                </div></a>
                @endforeach
            </div>
        </div>
    </section>
    <div class="review-section">
        <h1>Review Section</h1>
    
      

<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>

<label for="Customer review">Customer Review:</label>

<textarea id="Customer review" name="Customer Review" rows="4" cols="50">

</textarea>


<button class="Submit Review" onclick="return confirm">Delete </button>
</form>


    </div>

</body>
</html>

