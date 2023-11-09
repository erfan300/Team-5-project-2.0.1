<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link href="{{ asset('css/logincss.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  </head>
  
    <!--Navigation start-->
    <header class="header">
        
        <a href="#"><img src="images/logo.png" class="logo" alt="logo"></a>
        
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About us</a>
            <a href="#">Sign up</a>
            <a href="#">Log in</a>
        </nav>
    </header>

    <!--Navigation end-->


    <!--Login form start-->
    <body>
        <div class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>
                <form action="#">
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
                            <p>Don't have an account? <a href="#" class="register-link">Register</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </body>
  <!--Login form end-->
</html>