@extends('app')

@section('title')
Alimentos
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-success">
                <div class="panel-heading">
                    <h2>
                        Alimentos
                    </h2>
                    </div>
                    <div class="panel-body">
                    <hr>
                    {!! Form::open(array('action' => array('FoodsController@search', ''), 'method' => 'post')) !!}
                                                <div class="form-group">
                                                      <div class="col-xs-8">
                                                          <div class="input-group">
                                                            <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                                                            {!! Form::text('keyword','' ,array('class' => 'form-control', 'placeholder'=>"Buscar alimento por nombre o c&oacute;digo")) !!}
                                                          </div>
                                                      </div>

                                                    <div class="col-xs-2">
                                                        <input type="submit" class="btn btn-success" value="Buscar"/>
                                                    </div>

                                                </div>
                    {!! Form::close()!!}
                                                                    <br>
                                                                    <br>
                    <hr>
                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Grupo
                            </th>
                            <th>
                                A&ntilde;adido por
                            </th>
                            <th>
                                A&ntilde;adido en
                            </th>
                            <th>
                                Modificado por
                            </th>
                            <th>
                                Modificado en
                            </th>


                        </tr>
                                @foreach ($foods as $food)
                                    <tr>
                                        <td>
                                            {{ $food['food_code']}}
                                        </td>
                                        <td>
                                            {!! str_ireplace($keyword,'<strong>'.strtoupper($keyword).'</strong>',$food['food_name']) !!}
                                        </td>
                                        <td>
                                            {{ $food->foodgroups->food_group_name }}
                                        </td>
                                        <td>
                                            {{ $food['added_by'] }}
                                        </td>
                                        <td>
                                            {{ $food['created_at'] }}
                                        </td>
                                        <td>
                                            {{ $food['modified_by'] }}
                                        </td>
                                        <td>
                                            {{ $food['updated_at'] }}
                                        </td>
                                        <td>
                                            {!! HTML::decode(HTML::linkAction('FoodsController@edit', '<button type="submit" class="btn btn-primary btn-mini " data-toggle="tooltip" data-placement="top" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>', $food['id'])) !!}
                                        </td>
                                        <td>
                                            {!! Form::open(array('action' => array('FoodsController@destroy', $food['id']), 'method' => 'delete')) !!}
                                                <button type="submit" class="btn btn-danger btn-mini" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                    </table>
                    {!! str_replace('/?', '?', $foods->render()) !!}
                    {!! HTML::decode(HTML::linkAction('FoodsController@create','<button type="button" class="btn btn-primary btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Agregar Alimento</button>')) !!}
                </div>
            </div>
@stop

