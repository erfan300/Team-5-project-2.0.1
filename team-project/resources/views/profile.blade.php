<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>Profile</title>
</head>

<body> 
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

    <main>
        <!-- The profile update form (fully working)-->
       
        <form method="POST" action="{{ route('update-profile') }}">
            @csrf
            <h2>Profile</h2>
            <label for="username">Username:</label>
            @error('username')
            <p class="username-error">{{$message}}</p>
            @enderror
            <input type="text" name="username" value="{{ $user->Username }}" required>

            <label for="first_name">First Name:</label>
            @error('first_name')
            <p class="first-name-error">{{$message}}</p>
            @enderror
            <input type="text" name="first_name" value="{{ $relatedModel ? $relatedModel->First_Name : '' }}" required>

            <label for="last_name">Last Name:</label>
            @error('last_name')
            <p class="last-name-error">{{$message}}</p>
            @enderror
            <input type="text" name="last_name" value="{{ $relatedModel ? $relatedModel->Last_Name : '' }}" required>

            <label for="email">Email:</label>
            @error('email')
            <p class="email-error">{{$message}}</p>
            @enderror
            <input type="email" name="email" value="{{ $user->Email }}" required>

            <label for="phone_number" name="phone_number">Phone Number:</label>
            @error('phone_number')
            <p class="phone-number-error">{{$message}}</p>
            @enderror
            <input type="text" name="phone_number" value="{{ $relatedModel ? $relatedModel->Phone_Number : '' }}">

            <label for="address">Address:</label>
            @error('address')
            <p class="address-error">{{$message}}</p>
            @enderror
            <input type="text" name="address" value="{{ $relatedModel ? $relatedModel->Address : '' }}">

            <button type="submit">Update Profile</button>
        </form>

        <section>
    <h2>Previous Orders</h2>
    <a href="{{ route('profile.previous-orders') }}" class="button-style">Previous Orders</a>
</section>

</main>
</body>
</html>