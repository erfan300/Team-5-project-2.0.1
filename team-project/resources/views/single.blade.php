<!-- single.blade.php -->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/single.css" />
    <link href="{{ asset('css/single.css') }}" rel="stylesheet">
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

<section id="customer-details" class="container mt-5">
    <header>
        <h2>Customer Details</h2>
    <header>

    <ul>
    <div class="info">
        <h3><br>ID: {{ $customer->Customer_ID }}</br><h3>
        <h3><br>First Name: {{ $customer->First_Name }}</br><h3>
        <h3><br>Last Name: {{ $customer->Last_Name }}</br><h3>
        <h3><br>Address: {{ $customer->Address }}</br><h3>
        <h3><br>Phone Number: {{ $customer->Phone_Number }}</br><h3>
    
        @if(isset($user))
            <h3><br>Username: {{ $user->Username }}</br><h3>
            <h3><br>Email: {{ $user->Email }}</br><h3>
        @endif
        
    </ul>
</body>
</html>
