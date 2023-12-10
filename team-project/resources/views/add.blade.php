<!DOCTYPE html>
<html>
<head>
    <title>Add New Customer</title>
<link href="{{ asset('css/add.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
<header class="header">

<h1>Books4U BookStore</h1>

<nav>
    <a href="home"><i class="fas fa-home"></i> Home</a>
    <a href="profile"><i class="fas fa-user"></i> Profile</a>
    <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
    <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
    <a href="register"><i class="fas fa-user-plus"></i> Register</a>
    <a href="about"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
</nav>

</header>

    <h1 class="addTitle">Add New Customer</h1>
    <div class="container">
    <form method="POST" action="{{ route('store-customer') }}">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" class="text-box" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" class="text-box" required>

        <label for="username">Username:</label>
        <input type="text" name="username" class="text-box" required>

        <label for="email">Email:</label>
        <input type="email" name="email" class="text-box" required>

        <label for="email_confirmation">Confirm Email:</label>
        <input type="email" name="email_confirmation" class="text-box" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" class="text-box" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" class="text-box" required>

        <label for="address">Address:</label>
        <input type="text" name="address" class="text-box">
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" class="text-box">
        
        <button type="submit" class="btn">Create Customer</button>
    </form>
    <div>
</body>
</html>

