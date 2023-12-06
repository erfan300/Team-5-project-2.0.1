<!DOCTYPE html>
<html>
<head>
    <title>List of Customers</title>
    <style>
        /* Add your CSS styles here */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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
                </td>
                <td>
                    <a href="{{ route('modify-customer', ['id' => $customer->Customer_ID]) }}">Modify</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>