<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('user_id', Auth::id())->get();
        return view('attendances.index', compact('attendances'));
    }

    public function clockIn()
    {
        $attendance = Attendance::updateOrCreate(
            ['user_id' => Auth::id(), 'clock_out' => null],
            ['clock_in' => now()]
        );
        return redirect()->route('attendances.index');
    }

    public function clockOut()
    {
        $attendance = Attendance::where('user_id', Auth::id())
            ->whereNull('clock_out')
            ->latest()
            ->first();

        if ($attendance) {
            $attendance->update(['clock_out' => now()]);
        }

        return redirect()->route('attendances.index');
    }
}
