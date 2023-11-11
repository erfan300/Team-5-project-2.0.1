<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;





class UserController extends Controller
{
    //Show register form
    public function register() {
        return view('signup');
    }

    // Creates a new user
    public function store(Request $request) {
        $form = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users', 'Username')],
            'email' => ['required', 'email', 'confirmed', Rule::unique('users', 'Email')],
            'password' => ['required', 'confirmed', 'min:5'],
            'user_type' => ['required', 'in:Customer,Admin']
        ]);
    
        // Create User
        $user = User::create($form);

        $user->password = bcrypt($form['password']); // Hash the password
        $user->save();
        Log::info('New user created:', $user->toArray());
    
        // Determine the user type and insert data into the corresponding table
        if ($request->input('user_type') === 'Customer') {
            $customer = new Customer;
            $customer->User_ID = $user->User_ID;
            $customer->First_Name = $request->input('first_name');
            $customer->Last_Name = $request->input('last_name');
            $customer->Address = $request->input('address');
            $customer->Phone_Number = $request->input('phone_number');
            $customer->save();
        } elseif ($request->input('user_type') === 'Admin') {
            $admin = new Admin;
            $admin->User_ID = $user->User_ID;
            $admin->First_Name = $request->input('first_name');
            $admin->Last_Name = $request->input('last_name');
            $admin->Email = $request->input('email');
            $admin->Phone_Number = $request->input('phone_number');
            $admin->save();
        }

    
        auth()->login($user);
    
        return redirect('/home')->with('message', 'User created successfully');
    }
    

    //Show Login Form
    public function login() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('Email','=',$request->email)->first();

        if ($user && Hash::check($request->password, $user->Password)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Log in successful!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
        
        
    }
    
   
}
