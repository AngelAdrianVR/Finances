<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filters = $request->all('search');
        $expenses = ExpenseResource::collection(Expense::filter($filters)
                    ->latest()->paginate(30));
       return Inertia::render('Expense/Index', compact('expenses','filters'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
       return Inertia::render('Expense/Create',compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'concept' => 'required|max:30',
            'category_id' => 'required',
        ]);

       Expense::create($validated);
        
        request()->session()->flash('flash.banner', 'Se ha creado un nuevo Egreso correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('expenses.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        request()->session()->flash('flash.banner', 'Se ha eliminado correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('expenses.index');

    }
}
