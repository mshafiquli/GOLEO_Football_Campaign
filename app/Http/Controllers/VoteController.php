<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function index()
    {
        $votes = Vote::all(); 
        $alHilalVotes = Vote::where('team_name', 'LIKE', '%Al-Hilal%')->orWhere('team_name', 'LIKE', '%الهلال%')->get();
        $alIttihadVotes = Vote::where('team_name', 'LIKE', '%Union%')->orWhere('team_name', 'LIKE', '%الاتحاد%')->get();

        $totalVotes = $votes->count();
        $alHilalPercentage = $totalVotes > 0 ? ($alHilalVotes->count() / $totalVotes * 100) : 0;
        $alIttihadPercentage = $totalVotes > 0 ? ($alIttihadVotes->count() / $totalVotes * 100) : 0;

        return view('welcome', compact('votes', 'alHilalVotes', 'alIttihadVotes', 'totalVotes', 'alHilalPercentage', 'alIttihadPercentage'));
    }
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
