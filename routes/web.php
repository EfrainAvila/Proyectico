<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Ruta de prueba
Route::get('hola' , function(){
    echo "hola";
});

//Ruta de arreglos
Route::get('arreglo' , function(){
    //defino un arreglo
    $estudiantes = [ "AN" => "Ana" , 
                    "M" => "Maria" , 
                    "VA" => "Valeria" , 
                    "CA" => "Carlos" ];
    echo "<pre>";
    var_dump( $estudiantes );
    echo "</pre>";

    //ciclos foreach: recorrer arreglo
    foreach($estudiantes as $indice => $e ){
        echo "$e tiene el indice: $indice <br>";
    }
});

//ruta de paises
Route::get('paises' , function(){

    $paises=[
        "Colombia" => [
            "capital" => "Bogotá",
            "moneda" => "Peso",
            "población" => 50372424.0,
            "ciudades" => [ "Medellin", "Cali", "Barranquilla" ]
        ],
        "Peru" => [
            "capital" => "Lima",
            "moneda" => "Sol",
            "población" => 33050325.0,
            "ciudades" => [ "Cuzco", "Trujillo", "Arequipa" ]
        ],
        "Ecuador" => [
            "capital" => "Quito",
            "moneda" => "Dolar",
            "población" => 17517141.0,
            "ciudades" => [ "Guayaquil", "Manta", "Cuenca" ]
        ],
        "Brazil" => [
            "capital" => "Brasilia",
            "moneda" => "Real",
            "población" => 32137971.0,
            "ciudades" => [ "Rio de Janeiro", "Recife", "Bahia" ]
        ]
    ];

    //Enviar datos de paises a una vista
    //with the function view
    return view('paises')->with("paises" , $paises );

});

//Ruta de controlador
Route::get('artistas' , "ArtistaController@index");
Route::get('artistas/create' , 'ArtistaController@create');
Route::post('artistas/store' , 'ArtistaController@store');

Route::resource('empleados', 'EmpleadoController');
Route::get('master', function(){
    return view ('layouts.master');
});