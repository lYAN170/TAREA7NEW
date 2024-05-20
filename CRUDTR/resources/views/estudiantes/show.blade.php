@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalle del Estudiante') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="id">{{ __('ID') }}</label>
                    <p>{{ $estudiante->id }}</p>
                </div>
                <div class="form-group">
                    <label for="persona_dni">{{ __('DNI de Persona') }}</label>
                    <p>{{ $estudiante->persona_dni }}</p>
                </div>
                <div class="form-group">
                    <label for="estado">{{ __('Estado') }}</label>
                    <p>{{ $estudiante->estado ? 'Activo' : 'Inactivo' }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">{{ __('Fecha de Creación') }}</label>
                    <p>{{ $estudiante->created_at }}</p>
                </div>
                <div class="form-group">
                    <label for="updated_at">{{ __('Última Actualización') }}</label>
                    <p>{{ $estudiante->updated_at }}</p>
                </div>
                <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">{{ __('Volver a la Lista') }}</a>
            </div>
        </div>
    </div>
@endsection
