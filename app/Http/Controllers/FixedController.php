<?php

namespace App\Http\Controllers;

use App\Http\Resources\FixedResource;
use App\Models\Fixed;
use Illuminate\Http\Request;

class FixedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fixeds = FixedResource::collection(auth()->user()->fixeds()->latest()->paginate(30));
        return inertia('Fixed/Index', compact('fixeds'));
    }

   
    public function create()
    {
        return inertia('Fixed/Create');
    }

    
    public function store(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'concept' => 'required|max:70',
            'recurrency' => 'required',
        ]);

       Fixed::create($validated + ['user_id'=>auth()->id()]);
        
        request()->session()->flash('flash.banner', 'Se ha creado un nuevo gasto fijo correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('fixed.index');
    }

    
    public function show(Fixed $fixed)
    {
        //
    }

    
    public function edit(Fixed $fixed)
    {
        //
    }

    
    public function update(Request $request, Fixed $fixed)
    {
        //
    }

    
    public function destroy(Fixed $fixed)
    {
        $fixed->delete();
        request()->session()->flash('flash.banner', 'Se ha eliminado correctamente!');
        request()->session()->flash('flash.bannerStyle', 'success'); 
        return redirect()->route('fixed.index');
    }
}
