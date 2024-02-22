<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Page</title>
    <link href="{{ asset('css/discountpage.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
@if(auth()->user()->User_Type == 'Admin')
    <header class="header">
        <h1>Books4U BookStore</h1>
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
    </header>
    <div class="discount-header">
        <h2>Discount</h2>
    </div>
    <div class="discount-form">
        <form method="POST" action="{{ route('create-discount') }}">
            @csrf
            <label for="code">Discount Code:</label>
            <input type="text" name="code" required>
            
            <label for="percentage">Percentage:</label>
            <input type="number" name="percentage" step="0.01" required>

            <label for="expiry_date">Expiry Date:</label>
            <input type="date" name="expiry_date">

            <button type="submit">Create/Update Discount Code</button>
        </form>
    </div>
@else
    <p>You do not have permission to access this page.</p>
@endif
</body>
</html>

<style>
 :root {
    --primary-color: #283747; /* Dark blue-gray */
    --secondary-color: #f5f5f5; /* Light gray */
    --accent-color: #2980b9; /* Blue */
    --text-color: #c8e6d1; /* Dark gray */
    --link-color: #2980b9; /* Blue */
    --button-color: #283747; /* Blue */
}

* {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none; 
    border:none;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: var(--primary-color); 
    color: var(--secondary-color);
}

/* Header Styling */
.header {
    background-color: var(--primary-color);
    color: var(--secondary-color);
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Navigation Styling */
nav {
    background-color: var(--primary-color);
    overflow: hidden;
    text-align: center;
}

nav a {
    display: inline-block;
    color: var(--secondary-color);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

nav a:hover {
    background-color: var(--accent-color);
    color: var(--secondary-color);
}

nav a.active {
    background-color: var(--accent-color);
    color: var(--secondary-color);
}

nav a:last-child {
    border-right: none;
}

@media screen and (max-width: 600px) {
    nav a {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
}
.discount-header {
    text-align: center;
    margin-top: 50px; 
}
/* Form Styling */
.discount-form {
    margin-top: 20px; 
    text-align: center;
}

.discount-form form {
    max-width: 500px;
    width: 100%;
    margin: 0 auto;
    padding: 20px;
    background: var(--primary-color); 
    border-radius: 10px;
}

.discount-form label {
    display: block;
    margin-bottom: 10px;
    color: var(--text-color);
}

.discount-form input[type="text"],
.discount-form input[type="number"],
.discount-form input[type="date"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff; 
    color:black;
}

.discount-form button[type="submit"], .discount-form button[type="button"] {
    background-color: var(--primary-color);
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.discount-form button[type="submit"]:hover, .discount-form button[type="button"]:hover {
    background-color: var(--accent-color);
}
</style>