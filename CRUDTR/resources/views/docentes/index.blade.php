@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Lista de Docentes') }}</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-4">{{ __('Agregar Docente') }}</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docentes as $docente)
    <tr>
        <td>{{ $docente->id }}</td>
        <td>{{ $docente->persona_dni }}</td>
        <td>{{ $docente->estado ? 'Activo' : 'Inactivo' }}</td>
        <td>
            <a href="{{ route('docentes.edit', $docente->persona_dni) }}" class="btn btn-warning">{{ __('Editar') }}</a>
            <form action="{{ route('docentes.destroy', $docente->persona_dni) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
@endsection
