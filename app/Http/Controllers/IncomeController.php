<?php

namespace App\Http\Controllers;

use App\Http\Resources\IncomeResource;
use App\Models\Income;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IncomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filters = $request->all('search');

        $incomes = IncomeResource::collection(auth()->user()->incomes()->filter($filters)
                    ->latest()->paginate(30));
        return Inertia::render('Income/Index', compact('incomes','filters'));
    }

    public function create()
    {
       
        return Inertia::render('Income/Create');
    }

    public function store(Request $request)
    {
       $validated = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'concept' => 'required|max:70',
        ]);
       Income::create($validated + ['user_id'=>auth()->id()]);
        
        request()->session()->flash('flash.banner', 'Se ha creado un nuevo ingreso correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('incomes.index');
    }

    public function destroy(Income $income)
    {
        $income->delete();   
        request()->session()->flash('flash.banner', 'Se ha eliminado correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('incomes.index');
    }
}
