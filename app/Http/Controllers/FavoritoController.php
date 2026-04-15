<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function index()
    {
        $favoritos = Favorito::where('user_id', Auth::id())->get();
        return view('favoritos.index', compact('favoritos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required',
            'title'     => 'required',
            'image'     => 'required',
        ]);

        $existe = Favorito::where('user_id', Auth::id())
                          ->where('recipe_id', $request->recipe_id)
                          ->first();

        if ($existe) {
            return redirect()->back()->with('warning', 'Esta receta ya está en tus favoritos.');
        }

        Favorito::create([
            'user_id'   => Auth::id(),
            'recipe_id' => $request->recipe_id,
            'title'     => $request->title,
            'image'     => $request->image,
        ]);

        return redirect()->back()->with('success', 'Receta guardada en favoritos.');
    }

    public function update(Request $request, Favorito $favorito)
    {
        if ($favorito->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'No tienes permiso para editar esto.');
        }

        $request->validate([
            'notes' => 'nullable|string|max:500' 
        ]);

        $favorito->update([
            'notes' => $request->notes
        ]);

        return redirect()->route('favoritos.index')->with('success', 'Nota personal actualizada.');
    }

    public function destroy(Favorito $favorito)
    {
        if ($favorito->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar esto.');
        }

        $favorito->delete();

        return redirect()->back()->with('success', 'Receta eliminada de favoritos.');
    }
}