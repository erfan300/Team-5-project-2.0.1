<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/basket.css" />
    <script defer src="js/main.js"></script>
</head>

<body>
    <header>
        <h1>Books4U Bookstore</h1>
    </header>

    <!-- Navigation -->
    <nav>
        <a href="home">Home</a>
        <a href="profile">Profile</a>
        <a href="basket">Basket</a>
        <a href="login">Log In</a>
        <a href="about">About</a>
        <a href="contact">Contact</a>
    </nav>
    <br><br>

    <!-- Shopping Basket -->

<section id="shopping-basket" class="container mt-5">
    <header>
        <h2>Shopping Basket</h2>
    <header>

    <div>
        <table class="table">
            <tr>
                <th></th>
                <th>Book title</th>
                <th>Quantity</th>
                <th>Price</th>
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
                <th>{{ $basketItem->Quantity }}</th>
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
                            <input type="submit" value="Buy Now" class="btn">
                        @csrf
                        </form>
                    </div>
                </tfoot>
            </div>
        </table>    
    </div>
    
</section>

     
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

    :root {
        --blue: #6c96b6;
        --darkgreen: #384b42;
        --lightgreen: #6a9b86;
        --border: .1rem solid #6a9b86;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--lightgreen);
        color: var(--lightgreen);
    }

    /* Header Styling */
    header {
        background-color: var(--lightgreen);
        color: #a7eecf;
        padding: 20px;
        text-align: center;
    }

    /* Navigation Styling */
    nav {
        background-color: var(--darkgreen);
        overflow: hidden;
        text-align: center;
    }

    nav a {
        display: inline-block;
        color: var(--lightgreen);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    nav a:hover {
        background-color: var(--blue);
        color: black;
    }

    /* Shopping Basket Items */
    .basket-page {
        margin: 80px auto;
    }

    table {
        width: 95%;
        border: collapse;
        margin: auto;
        background-color: white;
        height: 100px;
    }

    h2 {
        position: absolute;
        left: 100px;
        top: 200px;
    }

h3{
    color:darkgreen;
}

    .basket-page thead tr {
        background-color: black;
        font-weight: normal;
        text-align: left;
        padding: 60px;
    }

    .btn {
        /* Removed absolute positioning */
        background: var(--darkgreen);
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.2s linear;
    }

    .btn:hover {
        background: var(--blue);
    }

    #checkout-button {
        position: relative;
        margin-top: 20px; 
    }
</style>






</body>

</html>