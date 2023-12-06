<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
    <!-- Add your styles or link your CSS here -->
</head>
<body>
    <h1>Update Customer Information</h1>
    <form method="POST" action="{{ route('update-customer', ['id' => $customer->Customer_ID]) }}">
        @csrf
        @method('PUT')
        <!-- Add form fields to update customer details -->
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $customer->First_Name }}" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $customer->Last_Name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->Email }}" required>
        
        <!-- Add other fields for address, phone number, etc. -->

        <button type="submit">Update</button>
    </form>
</body>
</html>
