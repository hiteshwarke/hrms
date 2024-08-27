<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::where('user_id', Auth::id())->get();
        return view('payrolls.index', compact('payrolls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
        ]);

        $net_salary = $request->basic_salary + ($request->allowances ?? 0) - ($request->deductions ?? 0);

        Payroll::create([
            'user_id' => Auth::id(),
            'basic_salary' => $request->basic_salary,
            'allowances' => $request->allowances,
            'deductions' => $request->deductions,
            'net_salary' => $net_salary,
        ]);

        return redirect()->route('payrolls.index');
    }
}
