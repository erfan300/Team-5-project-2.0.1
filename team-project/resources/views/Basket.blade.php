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
                <li class="nav-item active">
                    <a class="nav-link" href="Home.blade.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Basket.blade.html">Basket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.blade.html">About us</a>
                    <li class="nav-item">
                        <a class="nav-link" href="login.blade.html">Log In/Sign In </a>
                </li>
            </ul>
        </div>
    </nav> 
 
    <!-- Shopping Basket -->
    <section id="shopping-basket" class="container mt-5">
        <h2>Shopping Basket</h2>
        <table class="table">
            <thead>
            <tr>
            <th>
                <h3>Product<h3>
            
                </th>
            <th>
                <h3>Quantity<h3>

                </th>
            <th>
                <h3>Subtotal<h3>

                </th>
</tr>
<thead>
</div>
<div class="total-price">

<table>
    <thead>
    <tr>
        <td>Total</td>
        <td>£0</td>
</tr>
</thead>
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