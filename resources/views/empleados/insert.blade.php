<!-- heredar la masterpage en esta vista (layout) -->
@extends('layouts.master')

@section('estilos-particulares')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('j-deps')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'}).val();
  } );
  </script>
@endsection

<!-- contenido vistas -->
@section('contenido_vistas')

    <form class="form-horizontal"  method="post" action="{{ url('empleados') }}" autocomplete="off">
        @csrf

        @if(session("mensaje"))
            <p class="alert-success"> {{ session("mensaje") }} </p>
        @endif
        
        <fieldset>

        <!-- Form Name -->
        <legend>Nuevo Empleado</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nombre</label>  
            <div class="col-md-5">
                <input id="textinput" name="nombre" type="text" placeholder="" class="form-control input-md" required="">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Apellido</label>  
            <div class="col-md-5">
            <input id="textinput" name="apellido" type="text" placeholder="" class="form-control input-md" required="">
                
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Jefe Directo</label>
            <div class="col-md-5">
                <select id="selectbasic" name="jefe" class="form-control" required="">
                    <!-- Recorrer los jefes -->
                    @foreach($jefes as $j)
                        <option value="{{ $j->EmployeeId }}"> {{ $j->LastName }} , {{ $j->FirstName }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Cargo</label>
            <div class="col-md-5">
                <select id="selectbasic" name="cargo" class="form-control" required="">
                    @foreach($cargos as $c)
                        <option> {{ $c->Title }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Fecha de Contratación</label>  
            <div class="col-md-5">
            <input id="datepicker" name="contrato" type="text" placeholder="" class="datepicker form-control input-md" required="">
                
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Fecha de Nacimiento</label>  
            <div class="col-md-5">
            <input id="" name="nacimiento" type="text" placeholder="" class="datepicker form-control input-md" required="">
                
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Email</label>  
            <div class="col-md-5">
            <input id="textinput" name="email" type="text" placeholder="" class="form-control input-md" required="">
                
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Dirección</label>  
            <div class="col-md-5">
            <input id="textinput" name="direccion" type="text" placeholder="" class="form-control input-md" required="">
                
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Ciudad</label>  
            <div class="col-md-5">
            <input id="textinput" name="ciudad" type="text" placeholder="" class="form-control input-md" required="">
                
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
            </div>
        </div>

        </fieldset>
    </form>

<!-- fin de la vista -->
@endsection