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
    <nav>
    <a href="home">Home</a>
    <a href="profile">Profile</a>
    <a href="basket">Basket</a>
    <a href="login">Log In</a>
    <a href="about">About</a>
    <a href="contact">Contact</a>
</nav>

    <!--Navigation end-->


    <!--Login form start-->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <body>
        <div class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>
                <form method="POST" action="/authenticate">
                    @csrf
                    <div class="input-box">
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
        
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <button type="submit" class="btn">Sign In</button>
                        <div class="login-register">
                        <p>Don't have an account? <a href="/register" class="register-link">Register</a></p>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </body>
  <!--Login form end-->
</html>