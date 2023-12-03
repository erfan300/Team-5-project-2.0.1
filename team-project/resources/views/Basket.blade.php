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

    <table class="table">
        <thead>
            <tr>
                <th>
                    <h3>Product<h3>
                </th>
                <th>
                    <h3>Price<h3>
                </th>
                <th>
                    <h3>Quantity<h3>
                </th>
            </tr>
        <thead>
        
        <tbody id="basket-item">
            <!-- basket items will be dynamically added here-->
        </tbody>
    
    <div class="total-price">
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><strong>Total:</strong></td>
                <td>£0</td>
            </tr>
        </tfoot>
</section>

<section id = "checkout-button">
    <form action="Paymentpage.html">
        <input type="submit" value="Continue to checkout" class="btn">
    </form>
</section>
     
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

:root{
    --blue:#6c96b6;
    --darkgreen:#384b42;
    --lightgreen:#6a9b86;
    --border:.1rem solid #6a9b86;
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
    color:#a7eecf ;
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


/*Shopping Basket Items*/

.basket-page{
    margin: 80px auto;
}
table{
    width:95%;
    border:collapse;
    margin:auto;
    background-color:white;
    height:100px;         
}

h2{
    position: absolute;
  left: 100px;
  top: 200px;
}


.basket-page thead tr{
    background-color:black;
    font-weight:normal ;
    text-align: left;
    padding: 60px;

}
.btn {
    position: absolute;
    right: 130px;
    top:480px;
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


</style>






</body>

</html>