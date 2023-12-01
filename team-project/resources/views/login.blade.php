<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link href="{{ asset('css/logincss.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <script defer src="js/main.js"></script>
</head>

<body>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <header class="header">
        <a href="#" class="logo">
            <img src="images/logo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="profile">Profile</a>
            <a href="basket">Basket</a>
            <a href="login">Log In</a>
            <a href="about">About</a>
            <a href="contact">Contact</a>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form method="POST" action="/authenticate">
                @csrf
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <button type="submit" class="btn">Sign In</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="/register" class="register-link">Register</a></p>
                </div>
                <div class="login-register">
                    <p>Forgot your password? <a href="/password" class="register-link">Reset Password here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>