
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
    <label for="username">Username:</label>
    <input type="text" name="username" value="{{ $user->Username }}" required>
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="{{ $relatedModel ? $relatedModel->First_Name : '' }}" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" value="{{ $relatedModel ? $relatedModel->Last_Name : '' }}" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user -> Email}}" required>
    <label for="phone_number" name="phone_number">Phone Number:</label>
    @error('phone_number')
        <p class="phone-number-error">{{$message}}</p>
    @enderror
    <input type="text" name="phone_number" value="{{ $relatedModel ? $relatedModel->Phone_Number : '' }}">
    
    <label for="address">Address:</label>
    <input type="text" name="address" value="{{ $relatedModel ? $relatedModel->Address : '' }}">
    <button type="submit">Update Profile</button>
</form>
    </main>
</body>
</html>
