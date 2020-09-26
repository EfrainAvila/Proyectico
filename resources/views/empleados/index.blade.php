<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" integrity="sha512-pli9aKq758PMdsqjNA+Au4CJ7ZatLCCXinnlSfv023z4xmzl8s+Jbj2qNR7RI8DsxFp5e8OvbYGDACzKntZE9w==" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de empleados</h1>
    <hr style="border: 0px;">
    <a class="btn btn-info" href="{{ url('empleados/create') }}">
        Nuevo Empleado
    </a>
    <hr style="border: 0px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Nombre y Apellido</td>
                <td>Cargo</td>
                <td>Email</td>
                <td>Detalles</td>
                <td>Actualizar</td>

            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td> {{ $empleado->FirstName }} <strong class="text-danger">{{ $empleado->LastName }} </strong></td>
                    <td> {{ $empleado->Title }} </td>
                    <td> {{ $empleado->Email }} </td>
                    <td>
                        <a href="{{ url('empleados/'.$empleado->EmployeeId) }}" class="btn btn-success"> Ver Detalles </a>
                    </td>
                    <td>
                        <a href="{{ url('empleados/'.$empleado->EmployeeId.'/edit') }}" class="btn btn-info"> Actualizar </a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- TODO: poner el paginador -->
    {{ $empleados->links() }}
</body>
</html>