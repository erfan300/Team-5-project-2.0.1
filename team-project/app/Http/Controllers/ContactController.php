<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user is associated with a valid customer record
            if ($user->customer) {
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
                        'Status' => 'Unread', 
                    ];

                    $contact = Contact::create($contactData); // Creates and inserts data into the contact database
                    if ($contact) {
                        return redirect()->back()->with('message', 'Message sent successfully!');
                    } else {
                        return redirect()->back()->with('message', 'Failed to save contact.');
                    }
                } catch (\Exception $e) {
                    Log::error('Error saving contact: ' . $e->getMessage());
                    return redirect()->back()->with('message', 'Failed to save contact.');
                }
            } else {
                return redirect()->back()->with('message', 'Only valid customers can submit the contact form.');
            }
        } else {
            return redirect()->route('login')->with('message', 'Please log in to submit the contact form.');
        }
    }
}
