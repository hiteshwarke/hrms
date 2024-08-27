<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::where('user_id', Auth::id())->get();
        return view('timesheets.index', compact('timesheets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required|string',
            'hours' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Timesheet::create([
            'user_id' => Auth::id(),
            'project' => $request->project,
            'hours' => $request->hours,
            'date' => $request->date,
        ]);

        return redirect()->route('timesheets.index');
    }
}

