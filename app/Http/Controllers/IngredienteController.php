<?php

namespace App\Http\Controllers;

use App\Models\ingrediente;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredientes = Ingrediente::where('user_id', auth()->id())->get();
        return view('ingredientes.index', compact('ingredientes'));
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
        $request->validate([
            'nombre' => 'required',
            'peso' => 'required',
            'categoria' => 'required'
        ]);

        Ingrediente::create([
            'user_id' => auth()->id(), 
            'nombre' => $request->nombre,
            'peso' => $request->peso,
            'categoria' => $request->categoria
        ]);

        return redirect()->route('ingredientes.index')->with('success', 'Ingrediente guardado en tu alacena.');
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


    //Metodo para home
    public function home()
    {
        // 1. Petición a la API
        $response = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
            'query'  => 'Chicken',
            'number' => 4,
            'apiKey' => config('services.food.key'),
        ]);

        $chicken = $response->json()['results'] ?? [];

        return view('ingredientes.home', compact('chicken'));
    }

    public function explorar()
    {
        $response = Http::get('https://api.spoonacular.com/recipes/random', [
            'number' => 8, 
            'apiKey' => config('services.food.key'),
        ]);

        $recetasAleatorias = $response->json()['recipes'] ?? [];

        return view('ingredientes.explorar', compact('recetasAleatorias'));
    }
}
