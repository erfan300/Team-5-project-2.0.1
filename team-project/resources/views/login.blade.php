<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <script defer src="js/main.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
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
 <a href="home">Home</a>
 <a href="profile">Profile</a>
 <a href="basket">Basket</a>
 <a href="login">Log In</a>
 <a href="about">About</a>
 <a href="contact">Contact</a>
</nav>

</header>

<!-- header section ends -->

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


    
<style>
    
    :root{
    --blue: #6c96b6;
    --darkgreen: #6a9b86; 
    --lightgreen: #c8e6d1; 
    --border: .1rem solid #6a9b86;
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
    scroll-behavior: smooth;
}



body{
    background: var(--darkgreen);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}


/* Header Styling */
.header{
    background-color: var(--darkgreen);
    color: var(--lightgreen);
    padding: 20px;
    position: fixed;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    top:0; left: 0; right: 0;
}



/* Navigation Styling */

body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

nav {
    background-color: var(--darkgreen);
    overflow: hidden;
    text-align: center;
}

a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

a:hover {
    background-color: var(--blue); 
    color: black;
}

a.active {
    background-color: var(--blue);
    color: white;
}

nav a:last-child {
    border-right: none;
}

@media screen and (max-width: 600px) {
    nav a {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
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
    color: #fff;
    border-radius: 7px;
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
    background-color: var(--blue);
}

</style>


</html>