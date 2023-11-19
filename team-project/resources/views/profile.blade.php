
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <header id="home-header">
	<h1>Books4U</h1>
    </header>
   
    
    <main>
        <h1>Profile</h1>
        <form method="POST" action="{{ route('update-profile') }}">
    @csrf
    <!-- Display current user details -->
    <label for="username">Username:</label>
    <input type="text" name="username" value="{{ $user->Username }}" required>
    <!-- Display other user details -->
    <!-- Add fields for other details to update -->
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="{{ $user->customer->First_Name ?? $user->admin->First_Name }}" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->customer->Email ?? $user->admin->Email }}" required>
    <!-- Add other fields you want to update -->

    <button type="submit">Update Profile</button>
</form>
    </main>
</body>
</html>
