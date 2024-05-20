<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Docente;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::with('persona')->get();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('docentes.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_dni' => 'required|string|max:8|exists:personas,dni',
            'estado' => 'required|boolean',
        ]);

        Docente::create($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente.');
    }

    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    //public function edit(Docente $docente)
    //{
    //    $personas = Persona::all();
    //    return view('docentes.edit', compact('docente', 'personas'));
    //}

    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        $personas = Persona::all();
        return view('docentes.edit', compact('docente', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);
        $request->validate([
            'persona_dni' => 'required|string|max:8|exists:personas,dni',
            'estado' => 'required|boolean',
        ]);

        $docente->update($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente.');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente.');
    }
}
