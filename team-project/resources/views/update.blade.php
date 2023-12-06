<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
</head>
<body>
    <h1>Update Customer Information</h1>
    <form method="POST" action="{{ route('update-customer', ['id' => $customer->Customer_ID]) }}">
        @csrf
        @method('PUT')
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $customer->First_Name }}" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $customer->Last_Name }}" required>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ $customer->Address }}" >
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" value="{{ $customer->Phone_Number }}" >

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->Email }}" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="{{ $user->Username }}" required>
        


        <button type="submit">Update</button>
    </form>
</body>
</html>
