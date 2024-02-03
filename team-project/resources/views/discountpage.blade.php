@if(auth()->user()->User_Type == 'Admin')
    <h1>Discount Page</h1>
    <form method="POST" action="{{ route('create-discount') }}">
        @csrf
        <label for="code">Discount Code:</label>
        <input type="text" name="code" required>
        
        <label for="percentage">Percentage:</label>
        <input type="number" name="percentage" step="0.01" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="date" name="expiry_date">

        <button type="submit">Create/Update Discount Code</button>
    </form>
@else
    <p>You do not have permission to access this page.</p>
@endif
