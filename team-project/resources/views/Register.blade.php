<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U</title>
    <link rel="icon" href="" type="" />
    <link rel="stylesheet" type="text/css" href="/" />
    <script defer src="js/main.js"></script>
</head>

<body>
    <header>
    </header>
    <main>
        <nav>
            <a href="home">Home</a>
            <a href="profile">Profile</a>
            <a href="basket">Basket</a>
            <a href="login">Log In</a>
            <a href="about">About</a>
            <a href="contact">Contact</a>
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
        <form method="POST" action="/users">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required><br><br>
            @error('first_name')
                <p class="first-name-error">{{$message}}</p>
            @enderror
            <input type="text" name="last_name" placeholder="Last Name" required><br><br>
            @error('last_name')
                <p class="last-name-error">{{$message}}</p>
            @enderror
            <input type="text" name="username" placeholder="Username" required><br><br>
            @error('username')
                <p class="username-error">{{$message}}</p>
            @enderror
            <input type="email" name="email" placeholder="Email Address" required><br><br>
            @error('email')
                <p class="email-error">{{$message}}</p>
            @enderror
            <input type="email" name="email_confirmation" placeholder="Confirm Email Address" required><br><br>
            @error('email_confirmation')
                <p class="confirm-email-error">{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password" required><br><br>
            @error('password')
                <p class="password-error">{{$message}}</p>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>
            @error('password_confirmation')
                <p class="confirm-password-error">{{$message}}</p>
            @enderror
            <input type="text" name="address" placeholder="Address"><br><br>
            @error('address')
                <p class="address-error">{{$message}}</p>
            @enderror
            <input type="text" name="phone_number" placeholder="Phone Number"><br><br>
            @error('phone_number')
                <p class="phone-number-error">{{$message}}</p>
            @enderror

            <label for="user_type">Select User Type:</label>
            <select name="user_type" id="user_type" required>
                <option value="" disabled selected>Select User Type</option>
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
            </select><br><br>
            @error('user_type')
                <p class="user-type-error">{{$message}}</p>
            @enderror
            <input type="submit" value="Sign Up">
            <a href="/login">Already registered</a>
        </form>
    </main>
    <footer>
    </footer>
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

    :root {
        --blue: #6c96b6;
        --darkgreen: #384b42;
        --lightgreen: #6a9b86;
        --border: 0.1rem solid #6a9b86;
    }

    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
        text-transform: capitalize;
        transition: 0.2s linear;
        background: var(--darkgreen);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Navigation bar styles */
    nav {
        position: fixed;
        top: 0;
        right: 0;
        padding: 20px;
    }

    nav a {
        margin-left: 20px;
        color: white;
        text-decoration: none;
        font-size: 1.6rem;
        transition: color 0.2s linear;
    }

    nav a:hover {
        color: var(--blue);
    }

    /* Your signup form styles here */
    form {
        font-size: 1.69em;
        padding: 20px;
        background-color: var(--lightgreen);
        border: 2px solid var(--darkgreen);
        border-radius: 10px;
        width: 500px;
    }

    form input {
        width: 100%;
        height: 30px;
        padding: 8px;
        margin: 10px 0;
    }
</style>

</html>