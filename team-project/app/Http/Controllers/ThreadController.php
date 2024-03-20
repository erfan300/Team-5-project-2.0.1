<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadController extends Controller
{
    // Display all threads
    public function index()
    {
        $threads = Thread::all();
       // dd("Controller method executed");
    return view('forum', ['threads' => $threads]);
    }

    
    public function create()
    {
        return view('forum.create');
    }

    
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a thread.');
        }
        $request->validate([
            'thread' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
        ]);

        Thread::create([
            'thread' => $request->input('thread'),
            'created_at' => now(), // Manually setting the created_at time
            'description' => $request->input('description'),
            'author' => $request->input('author'),
        ]);

        return redirect()->route('forum')->with('success', 'Thread created successfully!');
    }
}
