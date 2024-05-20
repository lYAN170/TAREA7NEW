<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Docente;

class CursoController extends Controller
{
    public function index()
    {
        // Obtener todos los cursos con la relación 'docente'
        $cursos = Curso::with('docente')->get();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        // Obtener todos los docentes
        $docentes = Docente::all();
        return view('cursos.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:300',
            'docente_id' => 'required|exists:docentes,id', // El docente_id debe existir en la tabla 'docentes'
            'estado' => 'required|boolean',
        ]);

        // Crear un nuevo curso con los datos del formulario
        Curso::create($request->all());

        // Redireccionar a la página de índice de cursos con un mensaje de éxito
        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    public function show($id)
    {
        // Obtener el curso por su ID
        $curso = Curso::findOrFail($id);
        
        // Retornar la vista de detalle del curso
        return view('cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        // Obtener el curso por su ID
        $curso = Curso::findOrFail($id);
        
        // Obtener todos los docentes
        $docentes = Docente::all();
        
        // Retornar la vista de edición del curso con los datos del curso y los docentes
        return view('cursos.edit', compact('curso', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:300',
            'docente_id' => 'required|exists:docentes,id', // El docente_id debe existir en la tabla 'docentes'
            'estado' => 'required|boolean',
        ]);
        
        // Obtener el curso por su ID
        $curso = Curso::findOrFail($id);
        
        // Actualizar los datos del curso con los datos del formulario
        $curso->update($request->all());
        
        // Redireccionar a la página de índice de cursos con un mensaje de éxito
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Obtener el curso por su ID y eliminarlo
        $curso = Curso::findOrFail($id);
        $curso->delete();
        
        // Redireccionar a la página de índice de cursos con un mensaje de éxito
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
