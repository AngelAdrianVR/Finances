<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Investment;
use App\Models\Loan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_incomes = number_format(auth()->user()->incomes()->get()->sum('quantity'), 2);
        $total_expenses = number_format(auth()->user()->expenses()->get()->sum('quantity'), 2);
        $total_loans = number_format(auth()->user()->loans()->whereNull('payed_at')->get()->sum('quantity'), 2);
        $total_debts = number_format(auth()->user()->debts()->whereNull('payed_at')->get()->sum('quantity'), 2);
        $total_investments = number_format(auth()->user()->investments()->whereNull('released_at')->get()->sum('quantity'), 2);

        return Inertia::render('Statistics/Index', compact('total_incomes', 'total_expenses', 'total_loans', 'total_debts', 'total_investments'));
    }

    public function incomes()
    {
        $incomes = auth()->user()->incomes;

        $filtered_incomes = [];
        for ($i = 1; $i <= 12; $i++) {
            $filtered_incomes[] = $incomes->filter(function ($income) use ($i){
                return $income->created_at->month == $i && $income->created_at->year == now()->year;
            })->sum('quantity');
        }

        return Inertia::render('Statistics/Incomes', compact('filtered_incomes'));
    }

    public function expenses()
    {
        $expenses = auth()->user()->expenses;

        $filtered_expenses = [];
        for ($i = 1; $i <= 12; $i++) {
            $filtered_expenses[] = $expenses->filter(function ($expense) use ($i){
                return $expense->created_at->month == $i && $expense->created_at->year == now()->year;
            })->sum('quantity');
        }

        return Inertia::render('Statistics/Expenses', compact('filtered_expenses'));
    }

    public function loans()
    {
        $loans = auth()->user()->loans;

        $filtered_loans = [];
        for ($i = 1; $i <= 12; $i++) {
            $filtered_loans[] = $loans->filter(function ($loan) use ($i){
                return $loan->created_at->month == $i && $loan->created_at->year == now()->year;
            })->sum('quantity');
        }

        return Inertia::render('Statistics/Loans', compact('filtered_loans'));
    }

    public function debts()
    {
        $debts = auth()->user()->debts;

        $filtered_debts = [];
        for ($i = 1; $i <= 12; $i++) {
            $filtered_debts[] = $debts->filter(function ($debt) use ($i){
                return $debt->created_at->month == $i && $debt->created_at->year == now()->year;
            })->sum('quantity');
        }

        return Inertia::render('Statistics/Debts', compact('filtered_debts'));
    }

    public function investments()
    {
        $investments = auth()->user()->investments;

        $filtered_investments = [];
        for ($i = 1; $i <= 12; $i++) {
            $filtered_investments[] = $investments->filter(function ($investment) use ($i){
                return $investment->created_at->month == $i && $investment->created_at->year == now()->year;
            })->sum('quantity');
        }

        return Inertia::render('Statistics/Investments', compact('filtered_investments'));
    }

    public function monthResume()
    {
       $incomes = auth()->user()->incomes;
       return $incomes;
        return Inertia::render('Statistics/MonthResume',compact('incomes'));
    }
}
