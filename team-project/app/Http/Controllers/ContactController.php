<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            'Subject' => 'required',
            'Message' => 'required',
            //'Status' => 'required',
        ]);

        try {
            $contact = Contact::create($validatedData);
            if ($contact) {
                return redirect()->back()->with('success', 'Message sent successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to save contact.');
            }
        } catch (\Exception $e) {
            Log::error('Error saving contact: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save contact.');
        }
    }
}
