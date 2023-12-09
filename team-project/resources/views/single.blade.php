<!-- single.blade.php -->
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="css/single.css" />
    <link href="{{ asset('css/single.css') }}" rel="stylesheet">
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
        <!-- Display additional details from the users table -->
        @if(isset($user))
            <h3><br>Username: {{ $user->Username }}</br><h3>
            <h3><br>Email: {{ $user->Email }}</br><h3>
        @endif
        <!-- Display other details as needed -->
    </ul>
</body>
</html>
