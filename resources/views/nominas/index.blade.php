@extends('layouts.layout')

@section('titulo', 'Nominas')
@section('content')
    <br>
    <h1 class="text-center pt-5 pb-3" id="res">Nominas Empleado</h1>


    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($query)
        <div class="alert alert-success alert-dismissible fade show">
            <p>Los resultados de la busqueda Son:</p><strong>{{ $query }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br><br>
    <a href="{{ route('nominas.create') }}" class="btn btn-outline-dark mb-3 float-center" id="bta">Crear Empleado</a>


    <br><br>
    <table class="table table-dark table-hover table-striped">
        <thead>
            <tr>
                <th id="white1">Nombre </th>
                <th id="white1">Cedula </th>
                <th id="white1">Salario </th>
                <th id="white1">DiasTrabajados </th>
                <th id="white1">Acciones</th>
            </tr>
        </thead id="white1">
        <tbody id="white1">
            @foreach ($nominas as $nomina)
                <tr>
                    <td id="white1"> {{ $nomina->nombreEmpleado }} </td>
                    <td id="white1"> {{ $nomina->cedula }} </td>
                    <td id="white1"> {{ $nomina->salario }} </td>
                    <td id="white1"> {{ $nomina->diasTrabajados }} </td>
                    <td>

                        <a href="{{ route('nominas.show', $nomina->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('nominas.edit', $nomina->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('nominas.destroy', $nomina->id) }}" method="post" class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Confirma la eliminacion de la sala  {{ $nomina->nombreEmpleado }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
