<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::all();
        return Inertia::render('Investment/Index', compact('investments'));
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
}
