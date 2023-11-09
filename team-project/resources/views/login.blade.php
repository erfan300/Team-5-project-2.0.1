<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Books4U</title>
</head>
<body>
<header>
    <h1>Log In</h1>
</header>
@if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
  
      <label for="pword"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
  
      <button type="submit">Login</button>
      <a href="{{ route('Signup') }}">Haven't registered before</a>

    </div>  
</form>

<footer>

</footer>
</body>
</html>

