@extends('app')

@section('title')
Nutrientes
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-success">
                <div class="panel-heading">
                    <h2>
                        Nutrientes
                    </h2>
                </div>
                    <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed table-hover">
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Unidad de medida
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
                                @foreach ($nutrients as $nutrient)
                                    <tr>
                                        <td>
                                            {{ $nutrient['id'] }}
                                        </td>
                                        <td>
                                            {{ $nutrient['nutrient_name'] }}
                                        </td>
                                        <td>
                                            {{ $nutrient['measurement_unit'] }}
                                        </td>
                                        <td>
                                            {{ $nutrient['added_by'] }}
                                        </td>
                                        <td>
                                            {{ $nutrient['created_at'] }}
                                        </td>
                                        <td>
                                            {{ $nutrient['modified_by'] }}
                                        </td>
                                        <td>
                                            {{ $nutrient['updated_at'] }}
                                        </td>
                                        <td>
                                            {!! HTML::decode(HTML::linkAction('NutrientsController@edit', '<button type="submit" class="btn btn-primary btn-mini"><span class="glyphicon glyphicon-pencil"></span></button>', $nutrient['id'])) !!}

                                        </td>
                                        <td>
                                            {!! Form::open(array('action' => array('NutrientsController@destroy', $nutrient['id']), 'method' => 'delete')) !!}
                                                <button type="submit" class="btn btn-danger btn-mini"><span class="glyphicon glyphicon-remove"></span></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                    </table>
                    {!! HTML::decode(HTML::linkAction('NutrientsController@create','<button type="button" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar Nutriente</button>')) !!}
                </div>
            </div>


@stop

