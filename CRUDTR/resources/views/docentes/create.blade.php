@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Agregar Docente') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('docentes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="persona_dni">{{ __('DNI de Persona') }}</label>
                        <select class="form-control" id="persona_dni" name="persona_dni" required>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->dni }}">{{ $persona->dni }} - {{ $persona->nombres }} {{ $persona->apellido_paterno }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1">{{ __('Activo') }}</option>
                            <option value="0">{{ __('Inactivo') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Agregar Docente') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
