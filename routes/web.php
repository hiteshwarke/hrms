<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Attendance Management Routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.home');
    })->name('dashboard.home');

    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::post('/attendance/clock-in', [AttendanceController::class, 'clockIn'])->name('attendances.clockIn');
    Route::post('/attendance/clock-out', [AttendanceController::class, 'clockOut'])->name('attendances.clockOut');
    Route::get('/attendance/history', [AttendanceController::class, 'history'])->name('attendances.history');
});

// Leave Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/{id}', [LeaveController::class, 'show'])->name('leaves.show');
    Route::put('/leaves/{id}', [LeaveController::class, 'update'])->name('leaves.update');
    Route::delete('/leaves/{id}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
});

// Expense Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');
    Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
});

// Rostering Routes
Route::middleware('auth')->group(function () {
    Route::get('/roster', [RosterController::class, 'index'])->name('roster.index');
    Route::post('/roster', [RosterController::class, 'store'])->name('roster.store');
    Route::get('/roster/{id}', [RosterController::class, 'show'])->name('roster.show');
    Route::put('/roster/{id}', [RosterController::class, 'update'])->name('roster.update');
    Route::delete('/roster/{id}', [RosterController::class, 'destroy'])->name('roster.destroy');
    Route::post('/roster', [RosterController::class, 'store'])->name('rosters.store');

});

// Timesheet Routes
Route::middleware('auth')->group(function () {
    Route::get('/timesheets', [TimesheetController::class, 'index'])->name('timesheets.index');
    Route::post('/timesheets', [TimesheetController::class, 'store'])->name('timesheets.store');
    Route::get('/timesheets/{id}', [TimesheetController::class, 'show'])->name('timesheets.show');
    Route::put('/timesheets/{id}', [TimesheetController::class, 'update'])->name('timesheets.update');
    Route::delete('/timesheets/{id}', [TimesheetController::class, 'destroy'])->name('timesheets.destroy');
});

// Payroll Routes
Route::middleware('auth')->group(function () {
    Route::get('/payroll', [PayrollController::class, 'index'])->name('payrolls.index');
    Route::post('/payroll', [PayrollController::class, 'store'])->name('payrolls.store');
    Route::get('/payroll/{id}', [PayrollController::class, 'show'])->name('payrolls.show');
    Route::put('/payroll/{id}', [PayrollController::class, 'update'])->name('payrolls.update');
    Route::delete('/payroll/{id}', [PayrollController::class, 'destroy'])->name('payrolls.destroy');
});

// Compliance Routes
Route::middleware('auth')->group(function () {
    Route::get('/compliance', [ComplianceController::class, 'index'])->name('compliance.index');
    Route::post('/compliance', [ComplianceController::class, 'store'])->name('compliance.store');
    Route::get('/compliance/{id}', [ComplianceController::class, 'show'])->name('compliance.show');
    Route::put('/compliance/{id}', [ComplianceController::class, 'update'])->name('compliance.update');
    Route::delete('/compliance/{id}', [ComplianceController::class, 'destroy'])->name('compliance.destroy');
    Route::post('/compliances', [ComplianceController::class, 'store'])->name('compliances.store');

});

// Helpdesk Routes
Route::middleware('auth')->group(function () {
    Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk.index');
    Route::post('/helpdesk', [HelpdeskController::class, 'store'])->name('helpdesk.store');
    Route::get('/helpdesk/{id}', [HelpdeskController::class, 'show'])->name('helpdesk.show');
    Route::put('/helpdesk/{id}', [HelpdeskController::class, 'update'])->name('helpdesk.update');
    Route::delete('/helpdesk/{id}', [HelpdeskController::class, 'destroy'])->name('helpdesk.destroy');
});

// Engagement Routes
Route::middleware('auth')->group(function () {
    Route::get('/engagement', [EngagementController::class, 'index'])->name('engagement.index');
    Route::post('/engagement', [EngagementController::class, 'store'])->name('engagement.store');
    Route::get('/engagement/{id}', [EngagementController::class, 'show'])->name('engagement.show');
    Route::put('/engagement/{id}', [EngagementController::class, 'update'])->name('engagement.update');
    Route::delete('/engagement/{id}', [EngagementController::class, 'destroy'])->name('engagement.destroy');
});

// Employee Self-service Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [EmployeeController::class, 'profile'])->name('profile');
    Route::post('/profile', [EmployeeController::class, 'updateProfile'])->name('profile.update');
});

// Reporting Routes
Route::middleware('auth')->group(function () {
    Route::get('/reports/attendance', [ReportController::class, 'attendanceReport'])->name('reports.attendance');
    Route::get('/reports/leaves', [ReportController::class, 'leavesReport'])->name('reports.leaves');
    Route::get('/reports/expenses', [ReportController::class, 'expensesReport'])->name('reports.expenses');
    Route::get('/reports/helpdesk', [ReportController::class, 'helpdeskReport'])->name('reports.helpdesk');
});

// Chat Routes
Route::middleware('auth')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
});