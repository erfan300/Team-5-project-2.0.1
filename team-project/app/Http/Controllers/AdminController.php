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
        $customers = Customer::all();

        return view('list', compact('customers'));
    }
    public function showCustomerDetails($id)
{
    $customer = Customer::find($id);

     $user = User::find($id);

    return view('single', compact('customer','user'));
}
public function deleteCustomer($id)
{
    $customer = Customer::find($id);

    if (!$customer) {
        return redirect('/')->with('error', 'Customer not found');
    }

    $userId = $customer->User_ID;

    $customer->delete();

    $user = User::find($userId);
    if ($user) {
        $user->delete();
    }

    return redirect('/')->with('message', 'Customer details deleted successfully');
}
public function modifyCustomer($id)
{
    $customer = Customer::find($id);
    $user = User::find($id);

    if (!$customer) {
        return redirect('/')->with('error', 'Customer not found');
    }

    return view('update', compact('customer','user'));
}
public function updateCustomer(Request $request, $id)
{
    $customer = Customer::find($id);
    $user = User::find($id);

    if (!$customer) {
        return redirect('/')->with('error', 'Customer not found');
    }

    $validatedData = $request->validate([
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'username' => ['required', Rule::unique('users', 'Username')],
        'email' => 'required|email',
        'phone_number' => ['sometimes', 'nullable', 'regex:/^(?:(?:\+|00)44|0)7(?:[45789]\d{2}|624)\s?\d{3}\s?\d{3}$/'],
        'address' => ['nullable'],
    ]);

    $customer->First_Name = $validatedData['first_name'];
    $customer->Last_Name = $validatedData['last_name'];
    $customer->Address = $validatedData['address'];
    $customer->Phone_Number = $validatedData['phone_number'];
    $user->Email = $validatedData['email'];
    $user->Username = $validatedData['username'];


    $customer->save();
    $user->save();

    return redirect('/')->with('message', 'Customer details updated successfully');
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
        'phone_number' => ['nullable', 'regex:/^(?:(?:\+|00)44|0)7(?:[45789]\d{2}|624)\s?\d{3}\s?\d{3}$/'],
    ]);

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

    return redirect('/')->with('message', 'Customer created successfully');
}




}
