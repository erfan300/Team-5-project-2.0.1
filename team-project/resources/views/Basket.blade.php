<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
   
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <link rel="stylesheet" type="text/css" href="css/style.css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
    <script defer src="js/main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav>
    <a href="home">Home</a>
    <a href="profile">Profile</a>
    <a href="basket">Basket</a>
    <a href="login">Log In</a>
    <a href="about">About</a>
    <a href="contact">Contact</a>
</nav>

    <!-- Shopping Basket -->
    <section id="shopping-basket" class="container mt-5">
        <h2>Shopping Basket</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="basket-items">
                <!-- basket items will be dynamically added here -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total:</strong></td>
                    <td id="basket-total">£0.00</td>
                </tr>
            </tfoot>
        </table>

        <form action="Paymentpage.html">
            <input type="submit" value="Continue to checkout" class="btn">
        </form>
    </section>
     
 
    <!-- Bootstrap & jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>