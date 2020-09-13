<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artista;
use Illuminate\Support\Facades\Validator;

class ArtistaController extends Controller
{
    //Los controladores están compuestos por ACCIONES: metodos de la clase Controller
    //debe haber una ruta para cada acción

    public function index(){

        //capturar datos con los modelos
        $artistas = Artista::all();

        //retornar vista que muestre los artistas
        return view('artistas.index')
                    ->With('artistas', $artistas);
    }

    public function create(){
        //mostrar el formulario para registrar artista
        return view('artistas.new');
    }

    public function store(Request $r){
        //Validación paso 1: Establecer las reglas de validación
        $reglas=[
            "nombre_artista" => [ 'required' , 'alpha' , 'min:3' , 'max:20' , 'unique:artists,Name' ]
        ];

        //Validación paso 1b: Poner mensajes personalizados
        $mensajes = [
            'required' => "El nombre artista es obligatorio",
            'alpha' => "Solo letras",
            'min' => "El :attribute debe tener :value caracteres como minimo"
        ];

        //Validación paso 2: Crear el objeto de validación
        $validador = Validator::make($r->all(), $reglas, $mensajes );

        //Validación paso 3: Validar - comparar input-data vs reglas
        if($validador->fails()){
            //Validación fallida
            //redirigir a la ruta anterior: pero con mensaje de error
            return redirect('artistas/create')->withErrors($validador);
        }

        //crear el objeto Artista
        $nuevo_artista = new Artista();
        //asignamos atributos
        $nuevo_artista->Name= $r->input('nombre_artista');
        //grabar
        $nuevo_artista->save();
        
        //redireccionar a la vista de nuevo:
        //redirect: una ruta que exista en el web.php (de get)
        //with del redirect: crea una variable de session flash, para aportar datos al destino
        return redirect('artistas/create')->with('exito',"Artista registrado exitosamente");
    }
}
