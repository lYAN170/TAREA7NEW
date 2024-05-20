@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Lista de Estudiante') }}</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-4">{{ __('Agregar Estudiante') }}</a>
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
                @foreach ($estudiantes as $estudiante)
    <tr>
        <td>{{ $estudiante->id }}</td>
        <td>{{ $estudiante->persona_dni }}</td>
        <td>{{ $estudiante->estado ? 'Activo' : 'Inactivo' }}</td>
        <td>
            <a href="{{ route('estudiantes.edit', $estudiante->persona_dni) }}" class="btn btn-warning">{{ __('Editar') }}</a>
            <form action="{{ route('estudiantes.destroy', $estudiante->persona_dni) }}" method="POST" style="display:inline-block;">
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
