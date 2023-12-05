<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Log;
use Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Check if the user is logged in
        if(Auth::check()) {
            $user = Auth::user();

            // Check if the user is associated with a valid customer record
            if($user->customer) {
                $validatedData = $request->validate([
                    'Name' => 'required',
                    'Email' => 'required|email',
                    'Subject' => 'required',
                    'Message' => 'required',
                ]);

                try {
                    $contactData = [
                        'Customer_ID' => $user->customer->Customer_ID,
                        'Name' => $validatedData['Name'],
                        'Email' => $validatedData['Email'],
                        'Subject' => $validatedData['Subject'],
                        'Message' => $validatedData['Message'],
                    ];

                    $contact = ContactController::create($contactData);
                    if ($contact) {
                        return redirect()->back()->with('success', 'Message sent successfully!');
                    } else {
                        return redirect()->back()->with('error', 'Failed to save contact.');
                    }
                } catch (\Exception $e) {
                    Log::error('Error saving contact: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Failed to save contact.');
                }
            } else {
                return redirect()->back()->with('error', 'Only valid customers can submit the contact form.');
            }
        } else {
            // Redirect to login if the user is not logged in
            return redirect('login')->with('message', 'Please log in to submit the contact form.');
       
             }
    }
}
