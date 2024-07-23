<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    // Método para mostrar la lista de películas
    public function index(Request $request)
    {
        $peliculas = $request->session()->get('peliculas', []);
        return view('peliculas.index', compact('peliculas'));
    }

    // Método para mostrar el formulario de creación de una nueva película
    public function create()
    {
        return view('peliculas.create');
    }

    // Método para guardar una nueva película
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $peliculas = $request->session()->get('peliculas', []);
        $peliculas[] = ['nombre' => $request->nombre, 'vista' => false];
        $request->session()->put('peliculas', $peliculas);

        return redirect()->route('peliculas.index')->with('success', 'Película añadida exitosamente.');
    }

    // Método para marcar una película como vista
    public function complete(Request $request, $index)
    {
        $peliculas = $request->session()->get('peliculas', []);
        if (isset($peliculas[$index])) {
            $peliculas[$index]['vista'] = true;
            $request->session()->put('peliculas', $peliculas);
        }

        return redirect()->route('peliculas.index')->with('success', 'Película marcada como vista.');
    }

    // Método para eliminar una película
    public function destroy(Request $request, $index)
    {
        $peliculas = $request->session()->get('peliculas', []);
        if (isset($peliculas[$index])) {
            unset($peliculas[$index]);
            $request->session()->put('peliculas', array_values($peliculas));
        }

        return redirect()->route('peliculas.index')->with('success', 'Película eliminada.');
    }
}

