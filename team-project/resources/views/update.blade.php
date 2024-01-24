<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
</head>
<body>
<header class="header">
<link href="{{ asset('css/update.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

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

    <h1 class="updateTitle">Update Customer Information</h1>
    <div class="container">
    <!-- The customer update form (fully working)-->
    <form method="POST" action="{{ route('update-customer', ['id' => $customer->Customer_ID]) }}">
        @csrf
        @method('PUT')
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $customer->First_Name }}" class="text-box" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $customer->Last_Name }}" class="text-box" required>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $customer->Address }}" class="text-box" >
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $customer->Phone_Number }}" class="text-box">

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->Email }}" class="text-box" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="{{ $user->Username }}" class="text-box" required>
        


        <button type="submit" class="btn">Update</button>
    </form>
    <div>
</body>
</html>
