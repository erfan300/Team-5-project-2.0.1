<!DOCTYPE html>
<html>
<head>
    <title>Add New Customer</title>
    <!-- Add your styles or link your CSS here -->
</head>
<body>
    <h1>Add New Customer</h1>
    <form method="POST" action="{{ route('store-customer') }}">
        @csrf
        <!-- Add form fields to create a new customer -->
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="email_confirmation">Confirm Email:</label>
        <input type="email" name="email_confirmation" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>

        <label for="address">Address:</label>
        <input type="text" name="address">
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number">
        
        <button type="submit">Create Customer</button>
    </form>
</body>
</html>

