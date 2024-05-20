@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Agregar Persona</h1>

    <!-- Formulario de agregar persona -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('personas.store') }}">
                @csrf
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ruc">RUC</label>
                    <input type="text" class="form-control" id="ruc" name="ruc">
                </div>
                <div class="form-group">
                    <label for="apellido_paterno">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                </div>
                <div class="form-group">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" id="sexo" name="sexo" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="text" class="form-control" id="foto" name="foto" value="user.png" readonly>
                </div>
                <div class="form-group">
                    <label for="imagen">Seleccionar Imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                    <small id="imagenHelp" class="form-text text-muted">Seleccione una imagen si desea
                        cambiarla.</small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-2">Agregar Persona</button>
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
