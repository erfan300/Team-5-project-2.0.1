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

<body>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
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
    <div class="wrapper">
        <div class="form-box password">
        <h2><span>Change Password</span></h2>
            <form method="POST" action="/change-password">
                @csrf

                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="new_password" required>
                    <label>New Password</label>
                </div>

                <div class="input-box">
                    <input type="password" name="new_password_confirmation" required>
                    <label>Confirm New Password</label>
                </div>

                <button type="submit" class="btn">Change Password</button>
                <div class="password-register">
                    <p>Remember your password? <a href="/login" class="login-link">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

  </body>
</html>

<style>
:root {
    --blue: #6c96b6;
    --darkgreen: #6a9b86;
    --lightgreen: #c8e6d1;
    --border: .1rem solid #6a9b86;
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
    transition: .2s linear;
}

html {
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
    background-color: var(--darkgreen);
    color: var(--lightgreen);
    padding: 20px;
    position: fixed;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    top: 0;
    left: 0;
    right: 0;
}

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
    font-size: 20px;
    font-weight: bold;
    color: black;
    text-align: center;
    margin-top: -30px;
}

.form-box h2 span {
    display: block;
    margin-top: 61px; 
}
.input-box {
    width: 100%;
    height: 40px;
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

.input-box input {
    height: 100%;
    width: 100%;
    font-size: 10px;
    color: black;
    background: transparent;
    font-weight: bold;
    margin-left: 5px;
}

.password-register {
    font-size: 10px;
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
    color: #fff;
    border-radius: 7px;
}

.btn {
    background: var(--darkgreen);
    height: 50px;
    width: 100%;
    border-radius: 7px;
    cursor: pointer;
    font-size: 10px;
    color: #fff;
    font-weight: bold;
}

.btn:hover {
    background-color: var(--blue);
}
</style>