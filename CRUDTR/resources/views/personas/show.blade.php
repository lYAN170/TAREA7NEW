@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Ver Persona') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="dni">{{ __('DNI') }}</label>
                    <input type="text" class="form-control" id="dni" value="{{ $persona->dni }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nombres">{{ __('Nombres') }}</label>
                    <input type="text" class="form-control" id="nombres" value="{{ $persona->nombres }}" readonly>
                </div>
                <div class="form-group">
                    <label for="apellido_paterno">{{ __('Apellido Paterno') }}</label>
                    <input type="text" class="form-control" id="apellido_paterno" value="{{ $persona->apellido_paterno }}" readonly>
                </div>
                <div class="form-group">
                    <label for="apellido_materno">{{ __('Apellido Materno') }}</label>
                    <input type="text" class="form-control" id="apellido_materno" value="{{ $persona->apellido_materno }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ruc">{{ __('RUC') }}</label>
                    <input type="text" class="form-control" id="ruc" value="{{ $persona->ruc }}" readonly>
                </div>
                <div class="form-group">
                    <label for="estado">{{ __('Estado') }}</label>
                    <input type="text" class="form-control" id="estado" value="{{ $persona->estado }}" readonly>
                </div>
                <div class="form-group">
                    <label for="sexo">{{ __('Sexo') }}</label>
                    <input type="text" class="form-control" id="sexo" value="{{ $persona->sexo }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input type="text" class="form-control" id="email" value="{{ $persona->email }}" readonly>
                </div>
                <a href="{{ route('personas.index') }}" class="btn btn-secondary">{{ __('Volver') }}</a>
            </div>
        </div>
    </div>
@endsection
