@extends('app')

@section('title')
Usuario - {!! $user->first_name !!}
@stop



@section('content')

<div id="content-wrapper"  class="panel panel-primary">
  <div class="panel-heading">
    <h2>
      Usuario - {!! $user->first_name !!} {!! $user->last_name_1 !!}
    </h2>
  </div>
  <div class="panel-body container-fluid">
    <div class="row">
      <div class="col-md-6" id="user_info">
        <table class="table">
          <thead>
            <tr>
              <th>
                Informacion Personal
              </th>
              <th>
                {!! HTML::decode(HTML::linkAction('UsersController@edit', '<button type="submit" class="btn btn-primary btn-mini " data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>', $user['id'])) !!}
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="product-name">
              <td>Nombre de usuario: </td>
              <td>{!!$user->first_name!!}</td>
            </tr>
            <tr>
              <td>Primer apellido: </td>
              <td>{!!$user->last_name_1!!}</td>
            </tr>
            <tr>
              <td>Segundo apellido: </td>
              <td>{!!$user->last_name_2!!}</td>
            </tr>
            <tr>
              <td>Telefono: </td>
              <td>{!!$user->telephone!!}</td>
              <tr>
                <td>Correo Electr&oacute;nico: </td>
                <td>{!!$user->email!!}</td>
              </tr>
              <tr>
                <td>Recibir correos </td>
                <td>
                  @if ($user->receive_emails)
                  S&iacute;
                  @else
                  No
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6" id="account_details_info">
          <table class="table">
            <thead>
              <tr>
                <th><strong>Cuenta</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr class="product-name">
                <td>Tipo de cuenta </td>
                <td>
                  @if ($user->accountdetails->type == 'a')
                  Administrador
                  @else
                  Usuario
                  @endif
                </td>
              </tr>
              <tr>
                <td>Status</td>
                <td>{!!$user->accountdetails->status!!}</td>
              </tr>
              <tr>
                <td>Fecha de afiliaci&oacute;n: </td>
                <td>{!!$user->accountdetails->sign_up_date!!}</td>
              </tr>
              <tr>
                <td>Fecha de expiraci&oacute;n: </td>
                <td>{!!$user->accountdetails->expiration_date!!}</td>
              </tr>
              <tr>
                <td>D&iacute;as restantes:</td>
                <td></strong>{!!$days['left']!!}</td>
              </tr>
            </tbody>
          </table>
          <div class="progress">
            @if ($days['left_perc'] < 10)
            <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: {!!$days['left_perc']!!}%">
            </div>
            @elseif($days['left_perc'] < 40)
            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {!!$days['left_perc']!!}%">
            </div>
            @else
            <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {!!$days['left_perc']!!}%">
            </div>
            @endif
          </div>
          <?php  date_default_timezone_set('America/Costa_Rica');
          $date=date('d/m/Y', time());
          $dateTime=date("s"); 
          $transaction->id= $dateTime.$transaction->id.$date;
          ?>


          <!--Aqui se gurada el estado de la cuenta para habilitar y deshabilitar la opcioón de pago-->
          {!! Form::hidden('est',$user->accountdetails->status, array('id'=>'estadoCuenta'))!!}


          <!--SE CREA VARIABLE DE SESSION CON LA LLAVE DE LA TRANSACCION  -->
          {{@Session::put('key',md5("{$user->id}.OCPL5mvhzN.1497.1.{$transaction->id}"))}}
          <!-- {!! Form::label('ke2',@Session::get('key') ,array ('id' => 'clave2') )!!} aqui se muestra la clave generada-->

          {!! Form::open(array('url' => env('PAYMENTS_URL'),'id' => 'formulario_busqueda')) !!}            
          {!! Form::hidden('co', $user->id ,array ('id' => 'IdUser')) !!}
          {!! Form::hidden('us', $transaction->id) !!}
          {!! Form::hidden('de', 'Pago anualidad') !!}
          {!! Form::hidden('mo', env('MEMBERSHIP_PRICE')) !!}
          {!! Form::hidden('nu', $user->first_name." ".$user->last_name_1) !!}
          {!! Form::hidden('nf', 'Afiliacion Valornut') !!}
          {!! Form::hidden('pr', '1497') !!}
          {!! Form::hidden('si', '1') !!}
          {!! Form::hidden('tm', '1') !!}
          {!! Form::hidden('em', $user->email) !!}
          {!! Form::hidden('ke',@Session::get('key') ,array ('id' => 'clave') )!!}
<div id="divEnviar">

</div>          <!--   {!! Form::submit('Realizar pago de anualidad', array('class' => 'btn btn-lg btn-success'),array('onclick' => 'return guardar_key_transaccion()')) !!}
 {!! Form::submit('Realizar pago de anualidad', array('class' => 'ocular btn btn-lg btn-success','id'=>'btnPago','style'=>'display::none')) !!}-->
         
          {!! Form::close() !!}

        </div>
      </div>




      <div class="row" id="payment_info">
        <div class="col-md-6">
          <h4>Pagos</h4>
          <hr>
          <table class="table table-striped table-condensed table-hover">
            <tr>
              <th>
                Id
              </th>
              <th>
                Tipo
              </th>
              <th>
                Estado
              </th>
              <th>
                Monto
              </th>
              <th>
                Fecha
              </th>
            </tr>
            @foreach ($user->accountDetails->payments as $payment)
            <tr>
              <td>
                {{ $payment['id']}}
              </td>
              <td>
                {{ $payment['type'] }}
              </td>
              <td>
                {{ $payment['status'] }}
              </td>
              <td>
                {{ $payment['amount'] }}
              </td>
              <td>
                {{ $payment['created_at'] }}
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

<SCRIPT type="text/javascript" src="../../public/js/jquery.js"> es la librería que uso</SCRIPT>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<style type="text/css">
.ocultar{


}

</style>
<script type="text/javascript">

$(document).ready(function() {


  ocultarBtnPago($("#estadoCuenta").val());

//guardar_key_transaccion();
$("#formulario_busqueda").submit(function() {
 //alert("LLamando a funcion");
 guardar_key_transaccion();
 // console.log("holaaaaaaaaaaaaaaaaaaaaaaa");
});

function ocultarBtnPago(estadoCuenta){


  if(estadoCuenta=="Activa"){
  }else{
    // Se agrega el boton para realizar el pago de la anualidad
    $("#divEnviar").html("<button type='submit' value='Realizar pago de anualidad'  class='ocular btn btn-lg btn-success' id='btnPago'>Realizar pago de anualidad </button>");
    $("#btnPago").show();

  }

}

function guardar_key_transaccion(){
  var clave=document.getElementById("clave").value;
  var userId=document.getElementById("IdUser").value;
    //alert("Opteniendo clave "+ clave +" --- "+userId);
    var ac="guardarKey";
    console.log("clave  "+clave);
    var ajax = new nuevoAjax();
    // alert("distrito ................................................ " + Distrito);
    //Todos los Archivos  C:\xampp\htdocs\valornut\valornut\transaction.php
    ajax.open("GET", "../../valornut/transaction.php?accion="+ac+"&key="+clave+"&userId="+userId, true);
    ajax.onreadystatechange = function () {
      if (ajax.readyState == 4) {

      }    
    }
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(null);

  }

  function nuevoAjax() {
    var xmlhttp = false;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {

      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }


});




</script>               