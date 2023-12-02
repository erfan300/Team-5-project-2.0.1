<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Subject' => 'required',
            'Message' => 'required',
            'Status' => 'required',
        ]);

        Contact::create($validatedData); // Inserts data into the 'contactus' table

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
