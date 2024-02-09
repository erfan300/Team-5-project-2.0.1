<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/basket.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script defer src="js/main.js"></script>
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
    <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
    <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
    <a href="register"><i class="fas fa-user-plus"></i> Register</a>
    <a href="about"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
    </nav>


    <br><br>

    <!-- Shopping Basket -->

<section id="shopping-basket" class="container mt-5">
    <header>
        <h2>Shopping Basket</h2>
    <header>
    <form method="POST" action="{{ route('apply-discount') }}">
            @csrf
            <label for="discount_code">Discount Code:</label>
            <input type="text" name="discount_code">
            <button type="submit">Apply Discount</button>
    </form>
    <div>
        <table class="table">
            <tr>
                <th></th>
                <th><h3>Book title<h3></th>
                <th><h3>Quantity<h3></th>
                <th><h3>Price<h3></th>
                <th></th>
            </tr>
            @if(count($basket) == 0)
                <p>Basket is Empty!</p>
            @endif
            <?php $totalPrice = 0; ?>
            @foreach ($basket as $basketItem)
            <tr>
                <th>
                    @if ($basketItem->product->productImages->first())
                        <img src="{{ asset('storage/' . $basketItem->product->productImages->first()->Image_URL) }}" alt="Product Image" width="150" height="200">
                    @else
                    <img src="{{ asset('/images/no-image.png') }}" alt="No Image" width="50" height="50">
                    @endif
                </th>
                <th>{{ $basketItem->product->Product_Name }}</th>
                <th>
                    <form method="post" action="{{ url('/updateQuantity', $basketItem->Basket_ID) }}">
                        @csrf
                        <select name="quantity" onchange="this.form.submit()">
                            @for ($i = 1; $i <= $basketItem->product->Stock_Level; $i++)
                                <option value="{{ $i }}" @if($i == $basketItem->Quantity) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </form>
                </th>
                <th>£{{ $basketItem->Price}}</th>
                <th><a class="removeButton" onclick="return confirm('Are you sure you want to remove?')" href="{{url('/removeFromBasket', $basketItem->Basket_ID)}}">Remove</th>
            </tr>
            <?php $totalPrice = $totalPrice + $basketItem->Price ?>
        @endforeach
        
            

            <div class="total-price">
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><strong><h3>Total:</h3></strong></td>
                        @if(count($basket) == 0)
                            <td><h3>£0</h3></td>
                        @else
                            <td>£{{ $totalPrice }}</td>
                        @endif
                        
                    </tr>
                    <div id = "checkout-button">
                    <form method="POST" action="{{ route('checkout') }}">
                        @csrf
                            <input type="submit" value="Checkout" class="btn">
                        @csrf
                        </form>
                    </div>
                </tfoot>
            </div>
        </table>    
    </div>
    
</section>
</body>

</html>