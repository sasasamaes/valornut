@extends('app')

@section('title')
Administrar Usuarios
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-primary">
                <div class="panel-heading">
                    <h2>
                        Administrar Usuarios
                    </h2>
                </div>
                <div class="panel-body container-fluid">
                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Apellido 1
                            </th>
                            <th>
                                Apellido 2
                            </th>
                            <th>
                                Tipo
                            </th>
                            <th>
                                Recibir Correos
                            </th>
                            <th>
                                Tel&eacute;fono
                            </th>
                            <th>
                                Correo
                            </th>
                            <th>
                                Miembro desde
                            </th>
                            <th>
                                Miembro hasta
                            </th>
                        </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user['first_name']}}
                                    </td>
                                    <td>
                                        {{ $user['last_name_1'] }}
                                    </td>
                                    <td>
                                        {{ $user['last_name_2'] }}
                                    </td>
                                    <td>
                                        @if ($user->accountdetails->type == 'a')
                                            Admin
                                        @else
                                            User
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user['receive_emails']==1?'Si':'No'}}
                                    </td>
                                    <td>
                                        {{ $user['telephone'] }}
                                    </td>
                                    <td>
                                        {{ $user['email'] }}
                                    </td>
                                    <td>
                                        {{ $user['updated_at'] }}
                                    </td>
                                    <td>
                                        {{ $user->accountdetails->expiration_date }}
                                    </td>
                                    <td>
                                        {!! HTML::decode(HTML::linkAction('UsersController@show', '<button type="submit" class="btn btn-primary btn-mini " data-toggle="tooltip" data-placement="top" title="Ver"><span class="glyphicon glyphicon-list-alt"></span></button>', $user['id'])) !!}
                                    </td>
                                    <td>
                                        {!! HTML::decode(HTML::linkAction('UsersController@edit', '<button type="submit" class="btn btn-primary btn-mini " data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>', $user['id'])) !!}
                                    </td>
                                    <td>
                                        {!! Form::open(array('action' => array('UsersController@destroy', $user['id']), 'method' => 'delete')) !!}
                                            <button type="submit" class="btn btn-danger btn-mini" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! HTML::decode(HTML::linkAction('UsersController@create','<button type="button" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar Usuario</button>')) !!}
                </div>
            </div>

@stop
