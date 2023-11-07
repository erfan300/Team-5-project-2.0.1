
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <title>Books4U</title>
    <link rel="icon" type="" href="">
     <link rel = "stylesheet" type="text/css" href="" />
        <link rel="stylesheet" type="text/css" href="css/style.css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"/>
        <script defer src="js/main.js"></script>
    </head>

</head>
<body>
<header>
<h1>Sign up</h1>
</header>
<main>

        <form method="POST" action="/register">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required><br><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br><br>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="text" name="address" placeholder="Address"><br><br>
            <input type="text" name="phone_number" placeholder="Phone Number"><br><br>
            <input type="password" name="password" placeholder="Password" required pattern=".{8,}"><br><br>
            
            <label for="user_type">Select User Type:</label>
            <select name="user_type" id="user_type" required>
                <option value="Customer">Customer</option>
                <option value="Admin">Admin</option>
            </select><br><br>

            <input type="submit" value="Sign Up">
        </form>
</main>
<footer>

</footer>

</body>
</html>
