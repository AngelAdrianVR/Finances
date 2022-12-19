<?php

use App\Http\Controllers\DebtController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StatisticController;
use App\Models\Debt;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Investment;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
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
        $total_incomes = number_format(auth()->user()->incomes()->whereMonth('created_at', now()->month )->sum('quantity'),2);
        $total_expenses = number_format(auth()->user()->expenses()->whereMonth('created_at', now()->month )->sum('quantity'),2);
        $total_loans = number_format(auth()->user()->loans()->WhereNull('payed_at')->get('quantity')->sum('quantity'),2);
        $total_debts = number_format(auth()->user()->debts()->WhereNull('payed_at')->get('quantity')->sum('quantity'),2);
        $total_investments = number_format(auth()->user()->investments()->WhereNull('released_at')->get('quantity')->sum('quantity'),2);
        
        return Inertia::render('Dashboard',compact('total_incomes','total_expenses','total_loans','total_debts','total_investments'));
    })->name('dashboard');
});

Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');
Route::get('/statistics/incomes', [StatisticController::class, 'incomes'])->name('statistics.incomes');
Route::get('/statistics/expenses', [StatisticController::class, 'expenses'])->name('statistics.expenses');
Route::get('/statistics/loans', [StatisticController::class, 'loans'])->name('statistics.loans');
Route::get('/statistics/debts', [StatisticController::class, 'debts'])->name('statistics.debts');
Route::get('/statistics/investments', [StatisticController::class, 'investments'])->name('statistics.investments');
Route::get('/statistics/resume', [StatisticController::class, 'monthResume'])->name('statistics.resume');


Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
Route::post('/incomes/store', [IncomeController::class, 'store'])->name('incomes.store');
Route::delete('/incomes/{income}', [IncomeController::class, 'destroy'])->name('incomes.destroy');


Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
// Route::get('/expenses/fixed', [ExpenseController::class, 'fixed'])->name('expenses.fixed');
Route::post('/expenses/store', [ExpenseController::class, 'store'])->name('expenses.store');
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

Route::get('/loans',[LoanController::class, 'index'])->name('loans.index');
Route::get('/loans/create',[LoanController::class, 'create'])->name('loans.create');
Route::post('/loans/store',[LoanController::class, 'store'])->name('loans.store');
Route::delete('/loans/{loan}',[LoanController::class, 'destroy'])->name('loans.destroy');
Route::put('/loans/{loan}/payed',[LoanController::class, 'markAsPayed'])->name('loans.mark-as-payed');

Route::get('/debts',[DebtController::class, 'index'])->name('debts.index');
Route::get('/debts/create',[DebtController::class, 'create'])->name('debts.create');
Route::post('/debts/store',[DebtController::class, 'store'])->name('debts.store');
Route::delete('/debts/{debt}',[DebtController::class, 'destroy'])->name('debts.destroy');
Route::put('/debts/{debt}/payed',[DebtController::class, 'markAsPayed'])->name('debts.mark-as-payed');

Route::get('/investments',[InvestmentController::class, 'index'])->name('investments.index');
Route::get('/investments/create',[InvestmentController::class, 'create'])->name('investments.create');
Route::post('/investments/store',[InvestmentController::class, 'store'])->name('investments.store');
Route::delete('/investments/{investment}',[InvestmentController::class, 'destroy'])->name('investments.destroy');
Route::put('/investments/{investment}/payed',[InvestmentController::class, 'markAsPayed'])->name('investments.mark-as-payed');

Route::get('/user/get-total',function(){
        $incomes = auth()->user()->incomes->sum('quantity');
        $expenses = auth()->user()->expenses->sum('quantity');
        $loans = auth()->user()->loans()->whereNull('payed_at')->get('quantity')->sum('quantity'); //restar
        $debts = auth()->user()->debts()->whereNotNull('payed_at')->get('quantity')->sum('quantity'); //restar 
        $investments = auth()->user()->investments()->whereNull('released_at')->get('quantity')->sum('quantity'); //restar
        $total = $incomes - $expenses - $loans - $debts - $investments;
        return response()->json(['total' => number_format($total), 'invests' => number_format($investments)]);
})->name('total');