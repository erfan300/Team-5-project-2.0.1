<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
{
    public function listCustomers()
    {
        // Fetch all customers from the database
        $customers = Customer::all();

        // Pass customers data to the view
        return view('list', compact('customers'));
    }
    public function showCustomerDetails($id)
{
    // Fetch the customer details based on the ID
    $customer = Customer::find($id);

     // Fetch user details for the associated customer
     $user = User::find($id);

    // Pass customer data to the single view
    return view('single', compact('customer','user'));
}
public function deleteCustomer($id)
{
    $customer = Customer::find($id);

    if (!$customer) {
        return redirect()->route('list')->with('error', 'Customer not found');
    }

    $userId = $customer->User_ID;

    // Delete customer details
    $customer->delete();

    // Delete related user details
    $user = User::find($userId);
    if ($user) {
        $user->delete();
    }

    // Redirect back with success message
    return redirect()->route('list')->with('message', 'Customer details deleted successfully');
}
public function modifyCustomer($id)
{
    $customer = Customer::find($id);
    $user = User::find($id);

    if (!$customer) {
        return redirect()->route('list')->with('error', 'Customer not found');
    }

    // Pass the customer data to the update view
    return view('update', compact('customer','user'));
}
public function updateCustomer(Request $request, $id)
{
    $customer = Customer::find($id);
    $user = User::find($id);

    if (!$customer) {
        return redirect()->route('list')->with('error', 'Customer not found');
    }

    $validatedData = $request->validate([
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'email' => 'required|email',
        // Add validation rules for other fields
    ]);

    $customer->First_Name = $validatedData['first_name'];
    $customer->Last_Name = $validatedData['last_name'];
    $user->Email = $validatedData['email'];
    // Update other fields accordingly

    $customer->save();
    $user->save();

    return redirect()->route('list-customers')->with('message', 'Customer details updated successfully');
}
public function createCustomer()
{
    return view('add');
}
public function storeCustomer(Request $request)
{
    $form = $request->validate([
        'first_name' => ['required', 'min:3'],
        'last_name' => ['required', 'min:3'],
        'username' => ['required', Rule::unique('users', 'Username')],
        'email' => ['required', 'email', 'confirmed', Rule::unique('users', 'Email')],
        'password' => ['required', 'confirmed', 'min:5'],
    ]);

    // Set the user_type directly to "Customer"
    $form['user_type'] = 'Customer';

    $user = User::create($form);

    $user->password = bcrypt($form['password']);
    $user->save();

    Log::info('New user created:', $user->toArray());

    $customer = new Customer;
    $customer->User_ID = $user->User_ID;
    $customer->First_Name = $request->input('first_name');
    $customer->Last_Name = $request->input('last_name');
    $customer->Address = $request->input('address');
    $customer->Phone_Number = $request->input('phone_number');
    $customer->save();

    return redirect('/list')->with('message', 'Customer created successfully');
}




}
