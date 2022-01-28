@extends('layouts.layout')

@section('titulo', 'Editar Empleado')

@section('content')
    <br>
    <h1 class="text-center my-5" id="res">Editar Empleado</h1>
    @if ($errors->any())

        <div class="alert alert-danger">
            <div class="header">
                <strong>Ups...</strong>algo salio mal
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{ route('nominas.update', $nomina->id) }}" method="post">
        @method('put')
        @csrf

        <div>
            <label for="nombreEmpleado" class="form-label texto my-2">
                <h4>Nombre del empleado</h4>
            </label>
            <input type="text" name="nombreEmpleado" id="nombreEmpleado" value="{{ $nomina->nombreEmpleado }}"
                class="form-control">
        </div>

        <div>
            <label for="cedula" class="form-label texto my-2">
                <h4>Cedula </h4>
            </label>
            <input type="text" name="cedula" id="cedula" value="{{ $nomina->cedula }}" class="form-control">
        </div>

        <div>
            <label for="salario" class="form-label texto my-2">
                <h4>Salario</h4>
            </label>
            <input type="text" name="salario" id="salario" value="{{ $nomina->salario }}" class="form-control">
        </div>

        <div>
            <label for="diasTrabajados" class="form-label texto my-2">
                <h4>Dias Trabajados</h4>
            </label>
            <input type="text" name="diasTrabajados" id="diasTrabajados" value="{{ $nomina->diasTrabajados }}"
                class="form-control">
        </div>
        <br><br>
        <div>
            <button type="submit" class="btn btn-primary my-2" id="bta"> Guardar </button>
        </div>



    </form>
@endsection
