<?php

namespace App\Http\Controllers;

use App\Http\Resources\DebtResource;
use App\Models\Debt;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DebtController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all('search');
        $debts = DebtResource::collection(auth()->user()->debts()->filter($filters)
                ->latest()->paginate(30));
        return Inertia::render('Debt/Index',compact('debts','filters'));
    }

    public function create()
    {
        return Inertia::render('Debt/Create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'lender' => 'required|max:30',
            'reason' => 'max:100',
            'pay_date' => 'after:today',
        ]);

        Debt::create($validated + ['user_id'=>auth()->id()]);

        request()->session()->flash('flash.banner', 'Creada nuevo Registro de Deuda correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('debts.index');
        
    }

    public function destroy(Debt $debt)
    {
        $debt->delete();
        request()->session()->flash('flash.banner', 'Se ha eliminado correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('debts.index');
 
    }

    public function markAsPayed(Debt $debt)
   {
       $debt->update([
         'payed_at'=>now(),
       ]);
       
       request()->session()->flash('flash.banner', 'Se ha marcado como pagado');
       request()->session()->flash('flash.bannerStyle', 'success'); 
       return response()->json(['item'=>DebtResource::make($debt)]);

   }
}
