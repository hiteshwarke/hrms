<?php

namespace App\Http\Controllers;

use App\Models\Compliance;
use Illuminate\Http\Request;

class ComplianceController extends Controller
{
    public function index()
    {
        $compliances = Compliance::all();
        return view('compliances.index', compact('compliances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'policy_name' => 'required|string',
            'details' => 'required|string',
            'effective_date' => 'required|date',
        ]);

        Compliance::create($request->all());
        return redirect()->route('compliances.index');
    }
}
