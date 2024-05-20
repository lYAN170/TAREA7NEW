@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Persona') }}</h1>

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
                <form action="{{ route('personas.update', $persona) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="dni">{{ __('DNI') }}</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $persona->dni) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" {{ $persona->estado == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $persona->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ruc">{{ __('RUC') }}</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" value="{{ old('ruc', $persona->ruc) }}">
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">{{ __('Apellido Paterno') }}</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $persona->apellido_paterno) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">{{ __('Apellido Materno') }}</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $persona->apellido_materno) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">{{ __('Nombres') }}</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $persona->nombres) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">{{ __('Edad') }}</label>
                        <input type="number" class="form-control" id="edad" name="edad" value="{{ old('edad', $persona->edad) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">{{ __('Sexo') }}</label>
                        <select class="form-control" id="sexo" name="sexo" required>
                            <option value="M" {{ $persona->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ $persona->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $persona->email) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">{{ __('Foto') }}</label>
                        <input type="text" class="form-control" id="foto" name="foto" value="{{ old('foto', $persona->foto ?? 'user.png') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="imagen">{{ __('Seleccionar Imagen') }}</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                        <small id="imagenHelp" class="form-text text-muted">{{ __('Seleccione una imagen si desea cambiarla.') }}</small>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        <a href="{{ route('personas.index') }}" class="btn btn-secondary ml-2">{{ __('Regresar') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
