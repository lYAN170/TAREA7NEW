<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:personas',
            'estado' => 'required|boolean',
            'ruc' => 'nullable|string|max:11|unique:personas',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'required|string|max:50',
            'nombres' => 'required|string|max:50',
            'edad' => 'required|integer',
            'sexo' => 'required|string|max:1',
            'foto' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:100|unique:personas',
        ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    public function edit(Persona $persona)
    {
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, Persona $persona)
    {
        // Validar la entrada
        $request->validate([
            'dni' => 'required|string|max:8',
            'estado' => 'required|boolean',
            'ruc' => 'nullable|string|max:11|unique:personas,ruc,' . $persona->dni . ',dni',
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'required|string|max:50',
            'nombres' => 'required|string|max:50',
            'edad' => 'required|integer',
            'sexo' => 'required|string|max:1',
            'email' => 'required|string|email|max:100|unique:personas,email,' . $persona->dni . ',dni',
            'foto' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        // Procesar la imagen si se ha subido
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $persona->foto = $filename;
        }

        // Actualizar los datos de la persona
        $persona->dni = $request->dni;
        $persona->estado = $request->estado;
        $persona->ruc = $request->ruc;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->nombres = $request->nombres;
        $persona->edad = $request->edad;
        $persona->sexo = $request->sexo;
        $persona->email = $request->email;
        $persona->save();

        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente');
    }

    public function destroy(Persona $persona)
    {
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    }
}
