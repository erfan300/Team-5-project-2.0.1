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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script defer src="js/main.js"></script>
</head>

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
        <div class="wrapper">
            <div class="form-box change-password">
                <h2>Change Password</h2>
                <form method="POST" action="/change-password">
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
                    <input type="password" name="new_password" required>
                    <label>New Password</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="confirm_password" required>
                    <label>Confirm New Password</label>
                </div>

                <button type="submit" class="btn">Change Password</button>
                <div class="password-register">
                    <p>Remember your password? <a href="/login" class="login-link">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
    <!--Change Password form end-->
  </body>
</html>
<style> 
:root {
    --blue: #6c96b6;
    --darkgreen: #384b42;
    --lightgreen: #6a9b86;
    --border: 0.1rem solid #6a9b86;
  }
  
  * {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: 0.2s linear;
  }
  
  html {
    font-size: 62.5%;
    scroll-behavior: smooth;
  }
  
  body {
    background: var(--darkgreen);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .header {
    background: var(--darkgreen);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 7%;
    border-bottom: var(--border);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
  }
  
  .logo img {
    height: 7rem;
  }
  
  .header .navbar a {
    font-size: 1.5rem; 
    color: #fff;
  }
  
  .header .navbar a:hover {
    color: var(--blue);
    border-bottom: 0.1rem solid var(--blue);
    padding-bottom: 0.5rem;
  }
  
  /* NAVIGATION CSS */
  
  .navbar a {
    position: relative;
    font-size: 1.8rem; 
    color: #fff;
    font-weight: 500;
    text-decoration: none;
    margin-left: 40px;
  }
  
  /* PASSWORD CSS */
  
  .wrapper {
    width: 500px;
    height: 500px;
    background: var(--lightgreen);
    border-radius: 25px;
    display: flex;
    align-items: center;
  }
  
  .form-box {
    width: 100%;
    padding: 50px;
  }
  
  .form-box h2 {
    font-size: 2rem; 
    font-weight: bold;
    color: black;
    text-align: center;
  }
  
  .input-box {
    width: 100%;
    height: 35px;
    position: relative;
    border-bottom: 3px solid black;
    margin: 40px 0;
  }
  
  .input-box label {
    position: absolute;
    top: 50%;
    margin-left: 5px;
    font-size: 1.2rem; 
    color: black;
    font-weight: bold;
  }
  
  .input-box input:focus~label,
  .input-box input:valid~label {
    top: -10px;
  }
  
  .input-box input {
    height: 100%;
    width: 100%;
    font-size: 1rem;
    color: black;
    background: transparent;
    font-weight: bold;
    margin-left: 5px;
  }
  
  .password-register {
    font-size: 1rem;
    color: black;
    text-align: center;
    margin: 2em;
  }
  
  .password-register p a {
    color: black;
    font-weight: bold;
  }
  
  .password-register p a:hover {
    text-decoration: underline;
    color: var(--blue);
  }
  
  .btn {
    background: var(--darkgreen);
    height: 50px;
    width: 100%;
    border-radius: 7px;
    cursor: pointer;
    font-size: 1rem; 
    color: #fff;
    font-weight: bold;
  }
  
  .btn:hover {
    color: var(--blue);
  }
</style> 