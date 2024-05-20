@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Personas') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('personas.create') }}" class="btn btn-primary">{{ __('Agregar Persona') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>RUC</th>
                            <th>Estado</th>
                            <th>Sexo</th>
                            <th>E-Mail</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($personas as $persona)
                            <tr>
                                <td>{{ $persona->dni }}</td>
                                <td>{{ $persona->nombres }}</td>
                                <td>{{ $persona->apellido_paterno }}</td>
                                <td>{{ $persona->apellido_materno }}</td>
                                <td>{{ $persona->ruc }}</td>
                                <td>{{ $persona->estado }}</td>
                                <td>{{ $persona->sexo }}</td>
                                <td>{{ $persona->email }}</td>
                                <td>
                                    <a href="{{ route('personas.show', $persona) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
