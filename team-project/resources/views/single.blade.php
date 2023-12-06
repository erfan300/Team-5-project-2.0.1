<!-- single.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
</head>
<body>
    <h1>Customer Details</h1>
    <ul>
        <li>ID: {{ $customer->Customer_ID }}</li>
        <li>First Name: {{ $customer->First_Name }}</li>
        <li>Last Name: {{ $customer->Last_Name }}</li>
        <li>Address: {{ $customer->Address }}</li>
        <li>Phone Number: {{ $customer->Phone_Number }}</li>
        <!-- Display additional details from the users table -->
        @if(isset($user))
            <li>Username: {{ $user->Username }}</li>
            <li>Email: {{ $user->Email }}</li>
        @endif
        <!-- Display other details as needed -->
    </ul>
</body>
</html>
