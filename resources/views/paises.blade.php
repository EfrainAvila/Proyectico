<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="text-success"> Lista de paises </h1>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th> Pais </th>
                <th> Capital </th>
                <th> Moneda </th>
                <th> Población </th>
                <th> Ciudades Principales </th>
            </tr>
        </thead>
        <tbody>
            <!-- recorro la tabla foreach blade -->
            @foreach($paises as $pais => $infopais )
                <tr>
                    <td rowspan="3"> {{ $pais }} </td>
                    <td rowspan="3"> {{ $infopais["capital"] }} </td>
                    <td rowspan="3"> {{ $infopais["moneda"] }} </td>
                    <td rowspan="3"> {{ $infopais["población"] }} </td>
                    <td> {{ $infopais["ciudades"][0] }} </td>
                </tr>
                <tr>
                    <th> {{ $infopais["ciudades"][1] }} </th>
                </tr>
                <tr>
                    <th> {{ $infopais["ciudades"][2] }} </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>