<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanResource;
use App\Models\Loan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoanController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index(Request  $request)
   {
      $filters = $request->all('search');
      $loans = LoanResource::collection(auth()->user()->loans()->filter($filters)
         ->latest()->paginate(30));

      return Inertia::render('Loan/Index', compact('loans', 'filters'));
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
         'reason' => 'required|max:100',
         'pay_date' => 'after:today',
      ]);

      Loan::create($validated + ['user_id' => auth()->id()]);

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

   public function markAsPayed(Loan $loan)
   {
      $loan->update([
         'payed_at' => now(),
      ]);
      request()->session()->flash('flash.banner', 'Se ha marcado como pagado');
      request()->session()->flash('flash.bannerStyle', 'success');
      return response()->json(['item' => LoanResource::make($loan)]);
   }
}
