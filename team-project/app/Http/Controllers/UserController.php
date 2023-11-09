<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;




class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'email_confirmation' => 'required|email|same:email',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
            'user_type' => 'required|in:Customer,Admin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->all());
        }
    
    
        // Create a new user
        $user = new User;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');
        $user->save();
    
        // Determine the user type and insert data into the corresponding table
        if ($request->input('user_type') === 'Customer') {
            $customer = new Customer;
            $customer->user_id = $user->id; // Use $user->id to set the User_ID
            $customer->First_Name = $request->input('first_name');
            $customer->Last_Name = $request->input('last_name');
            $customer->Address = $request->input('address');
            $customer->Phone_Number = $request->input('phone_number');
            $customer->save();
        } elseif ($request->input('user_type') === 'Admin') {
            $admin = new Admin;
            $admin->user_id = $user->id; // Use $user->id to set the User_ID
            $admin->First_Name = $request->input('first_name');
            $admin->Last_Name = $request->input('last_name');
            $admin->Email = $request->input('email');
            $admin->Phone_Number = $request->input('phone_number');
            $admin->save();
        }
    
        // You can also redirect the user to a success page or provide a response message.
        return redirect('/signup');
    }


    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $username = $request->input('username');
        $user = User::where('username', $username)->first();
        Log::info('User Data: ' . json_encode($user));

        if ($user) {
            Log::info('Input Password: ' . $request->input('password'));
            Log::info('User Password: ' . $user->password);
            if (Hash::check(trim($request->input('password')), $user->password)) {
                // Password correct, log the user in
                return redirect()->route('home');
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
            }
            
        } else {
            return redirect()->back()->withErrors(['error' => 'User not found'])->withInput();
        }
    }
    
    
    
}
