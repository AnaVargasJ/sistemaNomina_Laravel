@extends('layouts.layout')

@section('titulo', 'empleado')
@section('content')
<br>
    <h1 class="text-center pt-5 pb-3" id="res">Detalles del empleado</h1>
    <br>
    <table class="table table-dark table-hover table-striped">
        <thead id="white1">
            <tr id="white1" >
                <th id="white1">Nombre </th>
                <th id="white1">Cedula </th>
                <th id="white1">salario</th>
                <th id="white1">Dias trabajados</th>
                <th id="white1">auxTransporte</th>
                <th id="white1">prima</th>
            </tr>
        </thead id="white1">

        <tbody id="white1">
            <tr id="white1">
                <td id="white1">{{ $nomina->nombreEmpleado }}</td>
                <td id="white1">{{ $nomina->cedula }}</td>
                <td id="white1">{{ number_format($nomina->salario, 2, ',', '.') }}</td>
                <td id="white1">{{ $nomina->diasTrabajados }}</td>
                <td id="white1">{{ number_format($nomina->auxTransporte, 2, ',', '.') }}</td>
                <td id="white1">{{ number_format($nomina->prima, 2, ',', '.') }}</td>
            </tr>

            <table class="table table-dark table-hover table-striped">
                <thead id="white1">
                    <br><br><br><br>
                    <h1 class="text-center pt-5 pb-3" id="res">Informacion general de los empleados</h1>
                    <br>
                    <tr id="white1">
                        <th id="white1">Promedio de primas </th>
                        <th id="white1">Empleado con mayor prima </th>
                        <th id="white1"> Empleado con con menor Prima</th>
                        <th id="white1">Total Primas</th>
                        <th id="white1">Empleados regitrados hasta el momento</th>

                    </tr>
                </thead>
                <tbody id="white1">
                    <tr id="white1">
                        <td id="white1">{{ number_format($promedio, 2, ',', '.') }}</td>
                        <td id="white1">{{ $nombreMayor }}</td>
                        <td id="white1">{{ $nombreMenor }}</td>
                        <td id="white1">{{ number_format($total, 2, ',', '.') }}</td>
                        <td id="white1">{{ $contador }}</td>


                    </tr>


                </tbody>
            </table>
            <a href="{{ route('nominas.index') }}" class="btn btn-primary mt-3" id="bta">Volver</a>

        @endsection:</h3>
