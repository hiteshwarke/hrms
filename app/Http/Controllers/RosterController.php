<?php

namespace App\Http\Controllers;

use App\Models\Roster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RosterController extends Controller
{
    public function index()
    {
        $rosters = Roster::where('user_id', Auth::id())->get();
        return view('rosters.index', compact('rosters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shift' => 'required|string',
            'date' => 'required|date',
        ]);

        Roster::create([
            'user_id' => Auth::id(),
            'shift' => $request->shift,
            'date' => $request->date,
        ]);

        return redirect()->route('rosters.index');
    }
}
