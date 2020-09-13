<!-- heredar la masterpage en esta vista (layout) -->
@extends('layouts.master')

<!-- contenido vistas -->
@section('contenido_vistas')

    <h2>Información del empleado:</h2>
    <div class="container">
        <div class="card" style="width:400px">
            <div class="card-header">
                {{ $empleado->FirstName }} {{ $empleado->LastName }} 
            </div>
            <div class="card-body">
                <h1 class="card-title">Cargo: {{ $empleado->Title }} </h1>
                <ul class="list-group list-group-flush">
                    @if($empleado->jefe_directo )
                        <li class="list-group-item">
                            {{ $empleado->jefe_directo->FirstName }}
                            {{ $empleado->jefe_directo->LastName }}
                        </li>
                    @endif
                    <li class="list-group-item">
                        Dirección: {{ $empleado->Address }} , {{ $empleado->City }} , {{ $empleado->Country }}
                    </li>
                    <li class="list-group-item">
                        Fecha Nacimiento: {{ $empleado->BirthDate->toFormattedDateString() }}
                    </li>
                    <li class="list-group-item">
                        Fecha Contratación: {{ $empleado->HireDate->toFormattedDateString() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <br />
    @if($empleado->subalternos->count() !==0 )
        <div class="container">
            <h2 class="text-success"> Subalternos: </h2>
            <ul class="list-group list-group-flush">
                @foreach( $empleado->subalternos as $subalterno )
                    <li class="list-group-item"> {{ $subalterno->FirstName }} , {{ $subalterno->LastName }} </li>
                @endforeach
            </ul>
        </div>
    @else
        <h2 class="text-danger"> El empleado no tiene subalternos </h2>
    @endif

    @if($empleado->clientes->count() !==0 )
        <div class="container">
            <h2 class="text-success"> Clientes: </h2>
            <ul class="list-group list-group-flush">
                @foreach( $empleado->clientes as $cliente )
                    <li class="list-group-item"> {{ $cliente->FirstName }} , {{ $cliente->LastName }} </li>
                @endforeach
            </ul>
        </div>
    @else
        <h2 class="text-danger"> El empleado no tiene clientes </h2>
    @endif

@endsection