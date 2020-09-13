<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" integrity="sha512-pli9aKq758PMdsqjNA+Au4CJ7ZatLCCXinnlSfv023z4xmzl8s+Jbj2qNR7RI8DsxFp5e8OvbYGDACzKntZE9w==" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1> Lista de Artistas </h1>
        <table>
            <thead>
                <tr>
                    <th>Artista(Grupo)</th>
                    <th>Albumes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artistas as $artista)
                <!-- Aqui muestro cada artista -->
                    <tr>
                        <td>{{ $artista->Name }}</td>
                        <td>
                            <ul>
                                @foreach ($artista->albumes()->get() as $album)
                                    <li> {{ $album->Title }} </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>