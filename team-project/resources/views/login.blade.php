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
                    </div>
                </form>
            </div>
        </div>
  </body>
  <!--Login form end-->


  <style>
    
    :root{
        --blue:#6c96b6;
        --darkgreen:#384b42;
        --lightgreen:#6a9b86;
        --border:.1rem solid #6a9b86;
    }
    
    *{
        font-family: 'Roboto', sans-serif;
        margin:0; padding:0;
        box-sizing: border-box;
        outline: none; border:none;
        text-decoration: none;
        text-transform: capitalize;
        transition: .2s linear;
    }
    
    html{
        font-size: 62.5%;
        scroll-behavior: smooth;
    }
    
    
    
    body{
        background: var(--darkgreen);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    

    
    .header{
        background: var(--darkgreen);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding:1.5rem 7%;
        border-bottom: var(--border);
        position: fixed;
        top:0; left: 0; right: 0;
        
    }
    
    .logo img{
        height: 7rem;
    }
    
    .header .navbar a{
       
        font-size: 15px;
        color:#fff;
    }
    
    .header .navbar a:hover{
        color:var(--blue);
        border-bottom: .1rem solid var(--blue);
        padding-bottom: .5rem;
    }
    
    
    
    
    /* NAVIGATION CSS */
    
    .navbar a{
        position: relative;
        font-size: 18px;
        color: #fff;
        font-weight: 500;
        text-decoration: none;
        margin-left: 40px;
    }
    
    
    
       /* LOGIN CSS */
    
       .wrapper{
        width: 500px;
        height: 500px;
        background: var(--lightgreen);
        border-radius: 25px;
        display: flex;
        align-items: center;
      }
      
      .form-box{
        width: 100%;
        padding: 50px;
      }
    
      .form-box h2{
        font-size: 20px;
        font-weight: bold;
        color: black;
        text-align: center;
      }
    
      .input-box{
        width: 100%;
        height: 65px;
        position: relative;
        border-bottom: 3px solid black;
        margin: 40px 0;
      }
      
      
    
    
      .input-box label {
        position: absolute;
        top: 50%;
        margin-left: 5px;
        font-size: 11px;
        color: black;
        font-weight: bold;
        
      }
    
      .input-box input:focus~label,
      .input-box input:valid~label {
        top: -10px;
      }
    
      .input-box input{
        height: 100%;
        width: 100%;
        font-size: 10px;
        color: black;
        background: transparent;
        font-weight: bold;
        margin-left: 5px;
      }
    
      
    
      .login-register {
        font-size: 10px;
        color: black;
        text-align: center;
        margin: 2em;
      }
    
      .login-register p a {
        color: black;
        font-weight: bold;
      }
    
      .login-register p a:hover {
        text-decoration: underline;
        color: var(--blue);
      }
    
    
      .btn{
        background: var(--darkgreen);
        height: 50px;
        width: 100%;
        border-radius: 7px;
        cursor: pointer;
        font-size: 10px;
        color: #fff;
        font-weight: bold;
      }
      
      .btn:hover{
        color: var(--blue);
    }
    
    </style>

</html>