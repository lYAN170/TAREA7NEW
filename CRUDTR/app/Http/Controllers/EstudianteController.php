<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('persona')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('estudiantes.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_dni' => 'required|string|max:8|exists:personas,dni',
            'estado' => 'required|boolean',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    //public function edit(Estudiante $estudiante)
    //{
    //    $personas = Persona::all();
    //    return view('estudiante.edit', compact('estudiante', 'personas'));
    //}

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $personas = Persona::all();
        return view('estudiantes.edit', compact('estudiante', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $request->validate([
            'persona_dni' => 'required|string|max:8|exists:personas,dni',
            'estado' => 'required|boolean',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}


