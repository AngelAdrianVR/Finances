<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanResource;
use App\Models\Loan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoanController extends Controller
{
   public function index()
   {
      $loans = LoanResource::collection(Loan::latest()->paginate(30));
    return Inertia::render('Loan/Index',compact('loans'));
   }

   public function create()
   {
    return Inertia::render('Loan/Create');
   }

   public function store(Request $request)
   {
      $validated = $request->validate([
         'quantity' => 'required|numeric|min:1',
         'debtor' => 'required|max:30',
         'pay_date' => 'after:today',
      ]);

         Loan::create($validated);

      request()->session()->flash('flash.banner', 'Se ha creado un nuevo Registro de Préstamo correctamente!');
      request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('loans.index');
   }

   public function destroy(Loan $loan)
   {
       $loan->delete();
       request()->session()->flash('flash.banner', 'Se ha eliminado correctamente!');
       request()->session()->flash('flash.bannerStyle', 'success'); 
       return redirect()->route('loans.index');

   }
}
