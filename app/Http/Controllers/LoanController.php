<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LoanController extends Controller
{
   public function index()
   {
    return Inertia::render('Loan/Index');
   }

   public function create()
   {
    return Inertia::render('Loan/Create');
   }

   public function store()
   {
   //  Inertia::render('Loan/Create');
   }
}
