<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DebtController extends Controller
{
    public function index()
    {
        $debts = Debt::all();
        return Inertia::render('Debt/Index',compact('debts'));
    }

    public function create()
    {
        return Inertia::render('Debt/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'debtor' => 'required|max:30',
            'pay_date' => 'after:today',
        ]);
        
    }
}
