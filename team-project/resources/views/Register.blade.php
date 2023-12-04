<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books4U Sign Up</title>
    <link rel="icon" href="" type="" />
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

        <form method="POST" action="/users">
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
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required><br><br>
            @error('first_name')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="text" name="last_name" placeholder="Last Name" required><br><br>
            @error('last_name')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="text" name="username" placeholder="Username" required><br><br>
            @error('username')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="email" name="email" placeholder="Email Address" required><br><br>
            @error('email')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="email" name="email_confirmation" placeholder="Confirm Email Address" required><br><br>
            @error('email_confirmation')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="password" name="password" placeholder="Password" required><br><br>
            @error('password')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>
            @error('password_confirmation')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="text" name="address" placeholder="Address"><br><br>
            @error('address')
            <p class="error-message">{{$message}}</p>
            @enderror

            <input type="text" name="phone_number" placeholder="Phone Number"><br><br>
            @error('phone_number')
            <p class="error-message">{{$message}}</p>
            @enderror

            <label for="user_type">User Type:</label>
            <select name="user_type" id="user_type" required>
                <option value="" disabled selected>Select User Type</option>
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
            </select><br><br>
            @error('user_type')
            <p class="error-message">{{$message}}</p>
            @enderror

            <button type="submit">Sign Up</button>
            <p>Already registered? <a href="/login">Log in</a></p>
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

    form {
        font-size: 1.69em;
        padding: 20px;
        background-color: var(--lightgreen);
        border: 2px solid var(--darkgreen);
        border-radius: 10px;
        width: 500px;
        text-align: center; 
        margin: 20px auto; 
    }


    form input {
        width: 470px;
        height: 15px; 
        padding: 8px;
        margin: 4px;
    }

    h1 {
        font-size: 1em;
        color: var(--darkgreen);
        margin-bottom: 10px;
    }

    .error-message {
        color: red;
        font-size: 1rem;
        margin-top: 5px;
    }
23
    label {
        display: block;
        margin-bottom: 5px;
        color: var(--darkgreen);
        font-size: 1rem;
    }

    select {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        box-sizing: border-box;
    }

    button {
        background-color: var(--darkgreen);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.2s ease-in-out;
    }

    button:hover {
        background-color: var(--blue);
    }

    a {
        color: var(--black);
        text-decoration: none;
        font-size: 1rem;
        margin-top: 10px;
        display: inline-block;
    }
</style>

</html>