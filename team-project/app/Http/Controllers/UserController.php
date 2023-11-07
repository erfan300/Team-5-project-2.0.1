<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;


class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'password' => 'required|min:8',
            'user_type' => 'required|in:Customer,Admin',
        ]);
    
        // Create a new user
        $user = new User;
        $user->username = $validatedData['username'];
        $user->password = bcrypt($validatedData['password']);
        $user->email = $validatedData['email'];
        $user->user_type = $validatedData['user_type'];
        $user->save();
    
        // Determine the user type and insert data into the corresponding table
        if ($validatedData['user_type'] === 'Customer') {
            $customer = new Customer;
            $customer->User_ID = $user->User_ID;
            $customer->First_Name = $validatedData['first_name'];
            $customer->Last_Name = $validatedData['last_name'];
            $customer->Address = $validatedData['address'];
            $customer->Phone_Number = $validatedData['phone_number'];
            $customer->save();
        } elseif ($validatedData['user_type'] === 'Admin') {
            $admin = new Admin;
            $admin->User_ID = $user->User_ID;
            $admin->First_Name = $validatedData['first_name'];
            $admin->Last_Name = $validatedData['last_name'];
            $admin->Email = $validatedData['email'];
            $admin->Phone_Number = $validatedData['phone_number'];
            $admin->save();
        }
    
        // You can also redirect the user to a success page or provide a response message.
        return redirect('/signup');
    }
    
}
