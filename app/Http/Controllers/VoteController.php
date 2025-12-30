<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email',
        ]);

        // Save everything in one go
        Vote::create([
            'team_name' => $request->team_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Vote Submitted Successfully');
    }
}
