<?php

use App\Http\Controllers\DebtController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StatisticController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');


Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::post('/incomes/store', [IncomeController::class, 'store'])->name('incomes.store');
Route::delete('/incomes/{income}', [IncomeController::class, 'destroy'])->name('incomes.destroy');


Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/expenses/store', [ExpenseController::class, 'store'])->name('expenses.store');
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

Route::get('/loans',[LoanController::class, 'index'])->name('loans.index');
Route::get('/loans/create',[LoanController::class, 'create'])->name('loans.create');
Route::post('/loans/store',[LoanController::class, 'store'])->name('loans.store');
Route::delete('/loans/{loan}',[LoanController::class, 'destroy'])->name('loans.destroy');

Route::get('/debts',[DebtController::class, 'index'])->name('debts.index');
Route::get('/debts/create',[DebtController::class, 'create'])->name('debts.create');
Route::post('/debts/store',[DebtController::class, 'store'])->name('debts.store');
Route::delete('/debts/{debt}',[DebtController::class, 'destroy'])->name('debts.destroy');

Route::get('/investments',[InvestmentController::class, 'index'])->name('investments.index');
Route::get('/investments/create',[InvestmentController::class, 'create'])->name('investments.create');
Route::post('/investments/store',[InvestmentController::class, 'store'])->name('investments.store');
Route::delete('/investments/{investment}',[InvestmentController::class, 'destroy'])->name('investments.destroy');

