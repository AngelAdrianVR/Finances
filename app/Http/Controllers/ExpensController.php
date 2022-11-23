<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       return Inertia::render('Expense/Index');
    }
}
