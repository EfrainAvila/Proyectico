<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperar todos los empleados
        $empleados = \App\Empleado::paginate(3);

        //Mostrar una vista con los empleados
        return view('empleados.index')->with("empleados", $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccione los empleados cuyo id sea 1, 2,6
        $managers = \App\Empleado::find([1,2,6]);

        //Seleccione los cargos sin repetir
        $cargos = \App\Empleado::select("Title")->distinct()->get();

        //dato escalar
        $h = 1;

        //Mostrar la vista de registrar o crear empleado
        return view ("empleados.insert")
                    ->with("jefes", $managers)
                    ->with("cargos", $cargos);          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        //Crear un objeto de tipo Empleado
        $empleado = new Empleado();
        //asignar valores a los atributos
        $empleado->FirstName = $request->input("nombre");
        $empleado->LastName = $request->input("apellido");
        $empleado->ReportsTo = $request->input("jefe");
        $empleado->Title = $request->input("cargo");
        $empleado->BirthDate = $request->input("nacimiento");
        $empleado->HireDate = $request->input("contrato");
        $empleado->Email = $request->input("email");
        $empleado->Address = $request->input("direccion");
        $empleado->City = $request->input("ciudad");
        //Registrar el objeto en base de datos
        $empleado->save();
        
        return redirect("empleados/create")->with('exito', 'Empleado registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar detalle del empleado cuyo $id es el del parametro
        $empleado = \App\Empleado::with('subalternos')
                                    ->with('clientes')
                                    ->with('jefe_directo')
                                    ->find($id); //SELECT * FROM EMPLOYEE WHERE EMPLOYEE ID =$id
        
        //Enviar el objeto a la vista
        return view('empleados.show')->with("empleado", $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Seleccionar el empleado a editar
        $empleado = Empleado::find($id);

        //Seleccione los empleados cuyo id sea 1, 2,6
        $managers = \App\Empleado::find([1,2,6]);

        //Seleccione los cargos sin repetir
        $cargos = \App\Empleado::select("Title")->distinct()->get();

        //Llevar el empleado a editar a la vista
        return view("empleados.edit")->with("empleado", $empleado)
                                     ->with("jefes", $managers)
                                     ->with("cargos", $cargos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regla=[
            "jefe" => "required"
        ];

        //Crear objeto validador
        $validador = Validator::make( $request->all() , $regla);

        //Validar
        if($validador->fails()){
            return redirect("empleados/$id/edit")
                        ->withErrors( $validador );
        }

        //Seleccionar el empleado por id que se va a actualizar
        $empleado = Empleado::find($id);
        //Asignar atributos
        $empleado->FirstName = $request->input("nombre");
        $empleado->LastName = $request->input("apellido");
        $empleado->ReportsTo = $request->input("jefe");
        $empleado->Title = $request->input("cargo");
        $empleado->BirthDate = $request->input("nacimiento");
        $empleado->HireDate = $request->input("contrato");
        $empleado->Email = $request->input("email");
        $empleado->Address = $request->input("direccion");
        $empleado->City = $request->input("ciudad");
        //Guardar
        $empleado->save();
        return redirect("empleados/$empleado->EmployeeId/edit")
                        ->with( "mensaje" , "Empleado actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
