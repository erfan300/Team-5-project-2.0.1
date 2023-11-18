
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
        <form method="POST" action="{{ route('updateProfile') }}">
            @csrf

            <label for="first_name">First Name</label>
            <input type="text" name="first_name" value="{{ $user->first_name }}"><br><br>

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}"><br><br>

            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"><br><br>

            @if($user->user_type === 'Customer')
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" value="{{ $user->customer->first_name }}"><br><br>

                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" value="{{ $user->customer->last_name }}"><br><br>
            @elseif($user->user_type === 'Admin')
                

                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" value="{{ $user->admin->last_name }}"><br><br>
            @endif

            <!-- Add other fields as needed -->

            <input type="submit" value="Update Profile">
        </form>
    </main>
</body>
</html>
