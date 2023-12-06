<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;


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


}
