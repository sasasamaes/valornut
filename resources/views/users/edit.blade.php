@extends('app')

@section('title')
Usuario - {!! $user->first_name !!}
@stop

@section('content')
            {!! Form::model($user, array('action' => array('UsersController@update',  $user->id), 'method' => 'PUT')) !!}
            <div id="content-wrapper"  class="panel panel-primary">
                <div class="panel-heading">
                    <h2>
                    Editar Usuario - {!! $user->first_name !!} {!! $user->last_name_1 !!}
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
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="product-name">
                                        <td>Nombre de usuario: </td>
                                        <td>
                                        {!! Form::text('first_name', null, array('placeholder' => 'Nombre', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Primer apellido: </td>
                                        <td>
                                        {!! Form::text('last_name_1', null, array('placeholder' => 'Primer Apellido', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Segundo apellido: </td>
                                        <td>
                                        {!! Form::text('last_name_2', null, array('placeholder' => 'Segundo Apellido', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telefono: </td>
                                        <td>
                                        {!! Form::text('telephone', null, array('placeholder' => 'Telefono', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Correo Electr&oacute;nico: </td>
                                        <td>
                                        {!! Form::text('email', null, array('placeholder' => 'Correo Electronico', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Recibir correos </td>
                                        <td>
                                        {!!Form::select('receive_emails', array('1' => 'Si', '0' => 'No' , 'default' => $user->accountdetails->receive_emails),$user->accountdetails->receive_emails)!!}
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
                                @if (Auth::admin())
                                    {!!Form::select('type', array('a' => 'Admin', 'u' => 'Usuario'),$user->accountdetails->type)!!}
                                @else
                                    {!! $user->accountdetails->type == 'a' ? 'Admin' : 'Usuario' !!}
                                @endif

                            </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    @if (Auth::admin())
                                        {!!Form::select('status', array('Activa' => 'Activa', 'Inactiva' => 'Inactiva'),$user->accountdetails->status)!!}
                                    @else
                                        {!! $user->accountdetails->status !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Fecha de afiliaci&oacute;n: </td>
                                <td>{!!$user->accountdetails->sign_up_date!!}</td>
                            </tr>
                            <tr>
                                <td>Fecha de expiraci&oacute;n: </td>
                                <td>
                                    @if (Auth::admin())
                                        <input id="expiration_date" name="expiration_date" class="form-control date-picker" autofocus="autofocus" value="{!!$user->accountdetails->expiration_date!!}" placeholder="Fecha de expiraci&oacute;n"/>
                                    @else
                                        {!!$user->accountdetails->expiration_date!!}
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                          </table>
                          {!! Form::submit('Actualizar', array('class' => 'btn btn-block btn-primary')) !!}
                          {!! Form::close() !!}
                      </div>
                    </div>
                </div>
            </div>
            <script>
            $('.date-picker').datepicker({
                    'format': 'yyyy-mm-dd',
                    'autoclose': true
            });
            </script>

@stop

