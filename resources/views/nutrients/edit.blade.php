    @extends('app')

    @section('title')
    Editar Nutriente
    @stop

    @section('content')
        <div id="content-wrapper"  class="panel panel-success">
            <div class="panel-heading">
                <h2>
                    Editar Nutriente
                </h2>
            </div>
            <div class="panel-body">
                {!! Form::model($nutrient, array('action' => array('NutrientsController@update',  $nutrient->id), 'method' => 'PUT')) !!}
                <div class="form-group">
                    <label for="id">Id del nutriente</label>
                    {!! Form::text('nutrient_code', null, array('placeholder' => 'Id', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                </div>
                <div class="form-group">
                    <label for="name">Nombre del Nutriente</label>
                    {!! Form::text('nutrient_name', null, array('placeholder' => 'Nombre', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                </div>
                <div class="form-group">
                    <label for="measurement_unit">Unidad de medida</label>
                    {!! Form::text('measurement_unit', null, array('placeholder' => 'g,mg,ml', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('added_by') !!}
                    {!! Form::hidden('modified_by') !!}
                </div>
                {!! Form::submit('Agregar', array('class' => 'btn btn-lg btn-primary')) !!}
                {!! Form::close() !!}
                </div>
        </div>
    @stop
