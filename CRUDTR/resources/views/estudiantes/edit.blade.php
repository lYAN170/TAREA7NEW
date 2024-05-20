@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Estudiante') }}</h1>

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
                <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="persona_dni">{{ __('DNI de la Persona') }}</label>
                        <select class="form-control" id="persona_dni" name="persona_dni" required>
                            @foreach($personas as $persona)
                                <option value="{{ $persona->dni }}" {{ $estudiante->persona_dni == $persona->dni ? 'selected' : '' }}>
                                    {{ $persona->dni }} - {{ $persona->nombres }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" {{ $estudiante->estado ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ !$estudiante->estado ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
