<?php
namespace App\Http\Controllers;

use App\Models\ChPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChPasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('password'); // Assuming your view file name is 'password.blade.php'
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = ChPassword::where('Email', $request->email)->first();

        if (!$user) {
            return redirect('/change-password')->with('error', 'Email not found. Please enter a valid email.');
        }

        
        $hashedPassword = Hash::make($request->new_password);

        // Update the hashed password
        $user->Password = $hashedPassword;
        $user->save();

        return redirect('/login')->with('success', 'Password updated successfully!');
    }
}