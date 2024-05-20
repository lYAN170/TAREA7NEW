@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Ver Curso') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="id">{{ __('ID') }}</label>
                    <input type="text" class="form-control" id="id" value="{{ $curso->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nombre">{{ __('Nombre del Curso') }}</label>
                    <input type="text" class="form-control" id="nombre" value="{{ $curso->nombre }}" readonly>
                </div>
                <div class="form-group">
                    <label for="descripcion">{{ __('Descripción') }}</label>
                    <textarea class="form-control" id="descripcion" readonly>{{ $curso->descripcion }}</textarea>
                </div>
                <div class="form-group">
                    <label for="docente">{{ __('Docente') }}</label>
                    <input type="text" class="form-control" id="docente" value="{{ $curso->docente->nombres }} {{ $curso->docente->apellido_paterno }}" readonly>
                </div>
                <div class="form-group">
                    <label for="estado">{{ __('Estado') }}</label>
                    <input type="text" class="form-control" id="estado" value="{{ $curso->estado ? 'Activo' : 'Inactivo' }}" readonly>
                </div>

                <a href="{{ route('cursos.index') }}" class="btn btn-secondary">{{ __('Volver') }}</a>
            </div>
        </div>
    </div>
@endsection
