<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestmentResource;
use App\Models\Investment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvestmentController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all('search');
        $investments = InvestmentResource::collection(Investment::filter($filters)
        ->latest()->paginate(30));
        return Inertia::render('Investment/Index', compact('investments','filters'));
    }

    public function create()
    {
        return Inertia::render('Investment/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'platform' => 'required|max:30',
            'type' => 'max:30',
            'profit' => 'max:30',
            'release_date' => 'after:today',
        ]);


        Investment::create($validated);

        request()->session()->flash('flash.banner', 'Nuevo Registro de Inversión creado correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('investments.index');
    }

    public function destroy(Investment $investment)
   {
       $investment->delete();
       request()->session()->flash('flash.banner', 'Se ha eliminado correctamente!');
       request()->session()->flash('flash.bannerStyle', 'success'); 
       return redirect()->route('investments.index');

   }

   public function markAsPayed(Investment $investment)
   {
       $investment->update([
         'released_at'=>now(),
       ]);
       request()->session()->flash('flash.banner', 'Se ha marcado como pagado');
       request()->session()->flash('flash.bannerStyle', 'success'); 
       return response()->json(['item'=>InvestmentResource::make($investment)]);

   }
}
