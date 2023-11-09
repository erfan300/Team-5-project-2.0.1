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
    <link rel="stylesheet" type="text/css" href="css/style.css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
    <script defer src="js/main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  
    <!--Navigation start-->
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

    <!--Navigation end-->


    <!--Login form start-->
    <body>
        <div class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                            </span>
                            <input type="email" required>
                            <label>Email</label>
                        </div>
        
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" required>
                            <label>Password</label>
                        </div>
                        <button type="submit" class="btn">Login</button>
                        <div class="login-register">
                        <p>Don't have an account? <a href="{{ route('Signup') }}" class="register-link">Register</a></p>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </body>
  <!--Login form end-->
</html>