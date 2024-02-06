<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" type="text/css" href="css/wishlist.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script defer src="js/main.js"></script>
</head>
<body>
    <header>
        <h1>Books4U Bookstore</h1>
    </header>

    <nav>
        <a href="home"><i class="fas fa-home"></i> Home</a>
        <a href="profile"><i class="fas fa-user"></i> Profile</a>
        <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
        <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
        <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
        <a href="register"><i class="fas fa-user-plus"></i> Register</a>
        <a href="about"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
    </nav>

    <br><br>

    <section id="wishlist" class="container mt-5">
        <header>
            <h2>{{ auth()->user()->Username }}'s Wishlist</h2>
        </header>
        <div>
            <table class="table">
                <tr>
                    <th><h3>Book Cover</h3></th>
                    <th><h3>Book title</h3></th>
                    <th></th>
                    <th></th>
                </tr>
                @if(count($wishlist) == 0)
                    <p>Wishlist is Empty!</p>
                @endif
                @foreach ($wishlist as $wishlistItem)
                <tr>
                    <th>
                        @if ($wishlistItem->product->productImages->first())
                            <a href="/book/{{$wishlistItem->product->Product_ID}}"><img src="{{ asset('storage/' . $wishlistItem->product->productImages->first()->Image_URL) }}" alt="Product Image" width="150" height="200"></a>
                        @else
                        <img src="{{ asset('/images/no-image.png') }}" alt="No Image" width="50" height="50">
                        @endif
                    </th>
                    <th><a href="/book/{{$wishlistItem->product->Product_ID}}">{{ $wishlistItem->product->Product_Name }}</a></th>
                    <th>
                        <a class="removeButton" onclick="return confirm('Are you sure you want to remove?')" href="{{url('/removeFromWishlist', $wishlistItem->Wishlist_ID)}}">Remove
                    </th>
                </tr>
                @endforeach
            </table>    
        </div>
    </section>
</body>
</html>
