<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <script defer src="js/main.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <link href="{{ asset('css/logincss.css') }}" rel="stylesheet">
</head>

<body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <!-- header section starts  -->

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

<!-- header section ends -->

    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <!-- Login form (fully working)-->
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