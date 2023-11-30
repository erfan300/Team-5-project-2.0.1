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
        return view('register');
    }

    // Creates a new user
    public function store(Request $request) {
        $form = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users', 'Username')],
            'email' => ['required', 'email', 'confirmed', Rule::unique('users', 'Email')],
            'password' => ['required', 'confirmed', 'min:5'],
            'user_type' => ['required', 'in:Customer,Admin'],
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
            $admin->Address = $request->input('address');
            $admin->Phone_Number = $request->input('phone_number');
            $admin->save();
        }

    
        auth()->login($user);
        session(['user_id' => $user->User_ID]);
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
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'Log in successful!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'You have been logged out!');
    }
    

    public function showProfile() {
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = User::with(['admin', 'customer'])
                    ->where('User_ID', $userId)
                    ->first(); 
    
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found');
        }
    
        // Check if user is an admin or a customer
        $relatedModel = null;
        if ($user->user_type === 'Admin') {
            $relatedModel = $user->admin;
        } elseif ($user->user_type === 'Customer') {
            $relatedModel = $user->customer;
        }

        // Return the view with the user's details and related model
        return view('profile', compact('user', 'relatedModel'));
    }
 
    public function updateProfile(Request $request) {
      // Retrieve user ID from session
      $userId = Auth::id(); // Fetch authenticated user ID
    
      $user = User::find($userId);
  
      if (!$user) {
          // Handle if user not found
          return redirect()->route('profile')->with('error', 'User not found');
      }
        // Validate and update the user's details
        $validatedData = $request->validate([
            'username' => ['required', 'unique:users,Username,'.$user->User_ID.',User_ID'],
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phone_number' => ['nullable', 'regex:/^(?:(?:\+|00)44|0)7(?:[45789]\d{2}|624)\s?\d{3}\s?\d{3}$/'],
            'address' => ['nullable'],
        ]);
    
        // Update the user's details
        $user->Username = $validatedData['username'];
    
       
        $user->Email = $validatedData['email']; // Update user's email
    
        $user->save(); // Save changes to the user
    
        // Update the corresponding table (Admins or Customers) based on User_Type
        if ($user->user_type === 'Admin') {
            $admin = Admin::where('User_ID', $user->User_ID)->first();
            if ($admin) {
                // Update admin details if found
                $admin->First_Name = $validatedData['first_name'];
                $admin->Last_Name = $validatedData['last_name'] ?? $admin->Last_Name; // Check if last_name is present
                $admin->Address = $validatedData['address'] ?? $admin->Address; // Check if address is present
                $admin->Phone_Number = $validatedData['phone_number'] ?? $admin->Phone_Number; // Check if phone_number is present
                // Update other admin fields here as needed
                $admin->save(); // Save changes to the admin
            }
        } elseif ($user->user_type === 'Customer') {
            $customer = Customer::where('User_ID', $user->User_ID)->first();
            if ($customer) {
                // Update customer details if found
                $customer->First_Name = $validatedData['first_name'];
                $customer->Last_Name = $validatedData['last_name'] ?? $customer->Last_Name; // Check if last_name is present
                $customer->Address = $validatedData['address'] ?? $customer->Address; // Check if address is present
                $customer->Phone_Number = $validatedData['phone_number'] ?? $customer->Phone_Number; // Check if phone_number is present
                // Update other customer fields here as needed
                $customer->save(); // Save changes to the customer
            }
        }
    
        // Redirect back to the profile page with a success message
        return redirect()->route('home')->with('message', 'Profile updated successfully');
    }
    
    
}
