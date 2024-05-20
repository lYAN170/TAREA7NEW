@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalle del Docente') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="id">{{ __('ID') }}</label>
                    <p>{{ $docente->id }}</p>
                </div>
                <div class="form-group">
                    <label for="persona_dni">{{ __('DNI de Persona') }}</label>
                    <p>{{ $docente->persona_dni }}</p>
                </div>
                <div class="form-group">
                    <label for="estado">{{ __('Estado') }}</label>
                    <p>{{ $docente->estado ? 'Activo' : 'Inactivo' }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">{{ __('Fecha de Creación') }}</label>
                    <p>{{ $docente->created_at }}</p>
                </div>
                <div class="form-group">
                    <label for="updated_at">{{ __('Última Actualización') }}</label>
                    <p>{{ $docente->updated_at }}</p>
                </div>
                <a href="{{ route('docentes.index') }}" class="btn btn-primary">{{ __('Volver a la Lista') }}</a>
            </div>
        </div>
    </div>
@endsection
