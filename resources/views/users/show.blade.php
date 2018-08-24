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
                                                      <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: {!!$days['used_perc']!!}%">
                                                      </div>
                                                  @elseif($days['left_perc'] < 40)
                                                      <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: {!!$days['used_perc']!!}">
                                                      </div>
                                                  @else
                                                      <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: {!!$days['used_perc']!!}%">
                                                      </div>
                                                  @endif
                        </div>
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
