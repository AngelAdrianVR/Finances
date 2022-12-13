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
        $total_incomes = number_format(auth()->user()->incomes()->get()->sum('quantity'),2);
        $total_expenses = number_format(auth()->user()->expenses()->get()->sum('quantity'),2);
        $total_loans = number_format(auth()->user()->loans()->whereNull('payed_at')->get()->sum('quantity'),2);
        $total_debts = number_format(auth()->user()->debts()->whereNull('payed_at')->get()->sum('quantity'),2);
        $total_investments = number_format(auth()->user()->investments()->whereNull('released_at')->get()->sum('quantity'),2);

       return Inertia::render('Statistics/Index', compact('total_incomes','total_expenses','total_loans','total_debts','total_investments'));
    }

    public function incomes()
    {
        return Inertia::render('Statistics/Incomes');
    }

    public function expenses()
    {
        return Inertia::render('Statistics/Expenses');
    }

    public function loans()
    {
        return Inertia::render('Statistics/Loans');
    }

    public function debts()
    {
        return Inertia::render('Statistics/Debts');
    }

    public function investments()
    {
        return Inertia::render('Statistics/Investments');
    }
}
