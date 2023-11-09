
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <title>Books4U</title>
    <link rel="icon" type="" href="">
     <link rel = "stylesheet" type="text/css" href="" />
        <link rel="stylesheet" type="text/css" href="css/style.css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
        <script defer src="js/main.js"></script>
    </head>

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
        <form method="POST" action="/register">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required><br><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br><br>

            <input type="text" name="username" placeholder="Username" required><br><br>
            
            <input type="email" name="email" placeholder="Email Address" required><br><br>
            <input type="email" name="email_confirmation" placeholder="Confirm Email Address" required><br><br>

            
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password"><br><br>


            
            <input type="text" name="address" placeholder="Address"><br><br>
            <input type="text" name="phone_number" placeholder="Phone Number"><br><br>
           
            
            <label for="user_type">Select User Type:</label>
            <select name="user_type" id="user_type" required>
                <option></option>
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
            </select><br><br>

            <input type="submit" value="Sign Up">
            <a href="{{ route('login') }}">Already registered</a>

        </form>
</main>
<footer>

</footer>

</body>
</html>
