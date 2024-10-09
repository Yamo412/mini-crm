<?php

//imported our auth facade

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Company;
use App\Models\Employee;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Route -> setting register to false
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Resource routes for companies and employees with authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class)->middleware('auth');
    Route::resource('employees', EmployeeController::class);
    
    Route::get('/dashboard', function () {
        $totalCompanies = Company::count(); // Get total companies
        $totalEmployees = Employee::count(); // Get total employees

        return view('dashboard', compact('totalCompanies', 'totalEmployees'));
    })->name('dashboard');
});
