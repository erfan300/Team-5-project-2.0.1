
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <link rel="stylesheet" type="text/css" href="css/style.css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
    <script defer src="js/main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- Bootstrap & jQuery JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>



<body>
<header>

</header>
<main>

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

<h1>Sign up</h1>
@if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/users">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" required><br><br>
            @error('first_name')
                <p class="first-name-error">{{$message}}</p>
            @enderror
        <input type="text" name="last_name" placeholder="Last Name" required><br><br>
            @error('last_name')
                <p class="last-name-error">{{$message}}</p>
            @enderror
        <input type="text" name="username" placeholder="Username" required><br><br>
            @error('username')
                <p class="username-error">{{$message}}</p>
            @enderror
        <input type="email" name="email" placeholder="Email Address" required><br><br>
            @error('email')
                <p class="email-error">{{$message}}</p>
            @enderror
        <input type="email" name="email_confirmation" placeholder="Confirm Email Address" required><br><br>
            @error('email_confirmation')
                <p class="confirm-email-error">{{$message}}</p>
            @enderror
        <input type="password" name="password" placeholder="Password" required><br><br>
            @error('password')
                <p class="password-error">{{$message}}</p>
            @enderror
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>
            @error('password_confirmation')
                <p class="confirm-password-error">{{$message}}</p>
            @enderror
        <input type="text" name="address" placeholder="Address"><br><br>
            @error('address')
                <p class="address-error">{{$message}}</p>
            @enderror
        <input type="text" name="phone_number" placeholder="Phone Number"><br><br>
            @error('phone_number')
                <p class="phone-number-error">{{$message}}</p>
            @enderror
    
        <label for="user_type">Select User Type:</label>
        <select name="user_type" id="user_type" required>
            <option value="" disabled selected>Select User Type</option>
            <option value="Customer">Customer</option>
            <option value="Admin">Admin</option>
        </select><br><br>
            @error('user_type')
                <p class="user-type-error">{{$message}}</p>
            @enderror
        <input type="submit" value="Sign Up">
        <a href="/login">Already registered</a>
    </form>
    
</main>
<footer>

</footer>


</body>
</html>
