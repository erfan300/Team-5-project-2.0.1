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
        
        $request->validate([
            'thread' => 'required|max:255',
            'description' => 'required',
        ]);

        
        $user = auth()->user();

        
        Thread::create([
            'thread' => $request->input('thread'),
            'created_at' => now(), 
            'description' => $request->input('description'),
            'author' => $user->name,
        ]);

        
        return redirect()->route('forum.index')->with('success', 'Thread created successfully!');
        
    }
}
