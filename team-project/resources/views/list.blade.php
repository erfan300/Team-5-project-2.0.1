<!DOCTYPE html>
<html>
<head>
    <title>List of Customers</title>
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>
<header class="header">

<h1>Books4U BookStore</h1>

<nav>
    <a href="home"><i class="fas fa-home"></i> Home</a>
    <a href="profile"><i class="fas fa-user"></i> Profile</a>
    <a href="basket"><i class="fas fa-shopping-basket"></i> Basket</a>
    <a href="wishlist"><i class="fas fa-heart"></i> Wishlist</a>
    <a href="login"><i class="fas fa-sign-in-alt"></i> Log In</a>
    <a href="register"><i class="fas fa-user-plus"></i> Register</a>
    <a href="about"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact"><i class="fas fa-envelope"></i> Contact</a>
</nav>

</header>

    <h1>List of Customers</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last_Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
            <td><a href="{{ route('customer.details', $customer->Customer_ID) }}">{{ $customer->Customer_ID }}</a></td>
                <td>{{ $customer->First_Name }}</td>
                <td>{{ $customer->Last_Name }}</td>
                <td>{{ $customer->Address }}</td>
                <td>{{ $customer->Phone_Number }}</td>
                <td>
                    <form method="POST" action="{{ route('customer.delete', ['id' => $customer->Customer_ID]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('modify-customer', ['id' => $customer->Customer_ID]) }}">Modify</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('create-customer') }}" class="btn btn-primary">Add Customer</a>

</body>
</html>