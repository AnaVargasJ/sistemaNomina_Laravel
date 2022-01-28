@extends('layouts.layout')

@section('titulo', 'Crear  EMPLEADO')

@section('content')
<br> <br>
<h1 class="text-center" id="res">Crear nuevo empleado</h1>
@if ($errors->any())

<div class ="alert alert-danger">
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
<br><br>
<form action="{{ route('nominas.store') }}" method="post">
    @method('post')
    @csrf
    <div>
        <label for="nombreEmpleado" class="form-label texto my-2"><h4>Nombre del empleado</h4></label>
        <input type="text" name="nombreEmpleado" id="nombreEmpleado" placeholder="Nombre " class="form-control" value="{{ old('nombreEmpleado') }}">
    </div>
    <div>
        <label for="cedula" class="form-label texto my-2"><h4>cedula</h4></label>
        <input type="text" name="cedula" id="cedula" placeholder="cedula " class="form-control" value="{{ old('cedula') }}">
    </div>
    <div>
        <label for="salario" class="form-label texto my-2"><h4>salario</h4></label>
        <input type="text" name="salario" id="salario" placeholder="salario " class="form-control" value="{{ old('salario') }}">
    </div>
    <div>
        <label for="diasTrabajados" class="form-label texto my-2"><h4>dias Trabajados</h4></label>
        <input type="text" name="diasTrabajados" id="diasTrabajados" placeholder="diasTrabajados " class="form-control" value="{{ old('diasTrabajados') }}">
    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-primary my-2" id="bta"> Guardar </button>
    </div>


    <div class="position-absolute top-50 start-50 translate-middle">


</form>
@endsection
