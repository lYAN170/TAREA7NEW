@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Curso') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('cursos.update', $curso) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre del Curso') }}</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $curso->nombre) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">{{ __('Descripción') }}</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="docente_id">{{ __('docente_id') }}</label>
                        <input class="form-control" id="docente_id" name="docente_id" required>
                            
                        
                    </div>

                    <div class="form-group">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" {{ $curso->estado ? 'selected' : '' }}>{{ __('Activo') }}</option>
                            <option value="0" {{ !$curso->estado ? 'selected' : '' }}>{{ __('Inactivo') }}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">{{ __('Regresar') }}</a>
                </form>
            </div>
        </div>
    </div>
@endsection
