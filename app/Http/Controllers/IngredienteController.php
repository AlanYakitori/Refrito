<?php

namespace App\Http\Controllers;

use App\Models\ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredientes = Ingrediente::all();
        return view('Ingredientes.index', compact('ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ingrediente::create([
            'nombre' => $request->nombre,
            'peso' => $request->peso,
            'categoria' => $request->categoria
        ]);

        return redirect()->route('ingredientes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ingrediente $ingrediente)
    {
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, Ingrediente $ingrediente)
    {
        $request->validate([
            'nombre' => 'required',
            'peso' => 'required',
            'categoria' => 'required'
        ]);

        $ingrediente->update($request->all());

        //Regresar al usuario a la consulta con un mensaje
        return redirect()->route('ingredientes.index')->with('success', 'Registro actualizado');
    }

   
    
    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente -> delete();

        return redirect()->route('ingredientes.index')->with('success', 'Ingrediente eliminado');
    }
}
