<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U Sign Up</title>
    <link rel="icon" href="" type="" />
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script defer src="js/main.js"></script>
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

    <main>
        <!-- Register form-->
        <form method="POST" action="/users">
            <h2>Sign up</h2>
            @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
            @endif
            @csrf

            <div class="input-box">
                <input type="text" name="first_name" placeholder="First Name" required>
                @error('first_name')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="text" name="last_name" placeholder="Last Name" required>
                @error('last_name')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                @error('username')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email Address" required>
                @error('email')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="email" name="email_confirmation" placeholder="Confirm Email" required>
                @error('email_confirmation')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                @error('password')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                @error('password_confirmation')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="text" name="address" placeholder="Address">
                @error('address')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <input type="text" name="phone_number" placeholder="Phone Number">
                @error('phone_number')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <div class="input-box">
                <label for="user_type">User Type:</label>
                <select name="user_type" id="user_type" required>
                    <option value="" disabled selected>Select User Type</option>
                    <option value="Customer">Customer</option>
                    <option value="Admin">Admin</option>
                </select>
                @error('user_type')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>

            <button type="submit">Sign Up</button>
            <p>Already registered? <a href="/login">Log in</a></p>
        </form>
    </main>
    <footer>
    </footer>
</body>

</html>