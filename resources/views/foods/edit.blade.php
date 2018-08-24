    @extends('app')

    @section('title')
    Editar Alimento
    @stop

    @section('content')
        <div id="content-wrapper"  class="panel panel-success">
            <div class="panel-heading">
                <h2>
                    Editar Alimento
                </h2>
            </div>
            <div class="panel-body">
                {!! Form::model($food, array('action' => array('FoodsController@update',  $food->id), 'method' => 'PUT')) !!}
               <div class="form-group">
                    <label for="food_code">Id de alimento </label>
                    {!! Form::text('food_code', null, array('placeholder' => 'Id de alimento', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="food_name">Nombre de alimento </label>
                    {!! Form::text('food_name', null, array('placeholder' => 'Nombre de alimento', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="food_group_id">Grupo alimenticio </label>
                    {!! Form::select('food_group_id', $food_groups,null, ['class'=>'form-control input-lg select2', 'id'=>'food_group_code', Input::old('food_group_code')]) !!}
               </div>
               <div class="form-group">
                    <label for="energy">Energ&iacute;a  (Kcal)</label>
                    {!! Form::text('energy', null, array('placeholder' => 'Energ&iacute;a', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="protein">Prote&iacute;na (g) </label>
                    {!! Form::text('protein', null, array('placeholder' => 'Prote&iacute;na', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="total_fat">Grasa total (g) </label>
                    {!! Form::text('total_fat', null, array('placeholder' => 'Grasa total', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="carbohydrates">Carbohidratos (g) </label>
                    {!! Form::text('carbohydrates', null, array('placeholder' => 'Carbohidratos', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="diet_fiber">Fibra diet&eacute;tica (g) </label>
                    {!! Form::text('diet_fiber', null, array('placeholder' => 'Fibra diet&eacute;tica', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="calcium">Calcio (mg) </label>
                    {!! Form::text('calcium', null, array('placeholder' => 'Calcio', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="phosphorus">F&oacute;sforo (mg) </label>
                    {!! Form::text('phosphorus', null, array('placeholder' => 'F&oacute;sforo', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="iron">Hierro (mg) </label>
                    {!! Form::text('iron', null, array('placeholder' => 'Hierro', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="thiamine">Tiamina (mg) </label>
                    {!! Form::text('thiamine', null, array('placeholder' => 'Tiamina', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="riboflavin">Riboflavina (mg) </label>
                    {!! Form::text('riboflavin', null, array('placeholder' => 'Riboflavina', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="niacin">Niacina (mg) </label>
                    {!! Form::text('niacin', null, array('placeholder' => 'Niacina', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="vitamin_c">Vitamina C (g) </label>
                    {!! Form::text('vitamin_c', null, array('placeholder' => 'Vitamina C', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="retinol_equivalents">Equivalentes de Retinol (microg) </label>
                    {!! Form::text('retinol_equivalents', null, array('placeholder' => 'Equivalentes de Retinol', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="mono_insaturated_fatty_acids">&Aacute;cidos grasos mono insaturados (g) </label>
                    {!! Form::text('mono_insaturated_fatty_acids', null, array('placeholder' => '&Aacute;cidos grasos mono insaturados', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="poly_insaturated_fatty_acids">&Aacute;cidos grasos poli insaturados (g) </label>
                    {!! Form::text('poly_insaturated_fatty_acids', null, array('placeholder' => '&Aacute;cidos grasos poli insaturados', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="saturated_fatty_acids">&Aacute;cidos grasos insaturados (g) </label>
                    {!! Form::text('saturated_fatty_acids', null, array('placeholder' => '&Aacute;cidos grasos insaturados', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="cholesterol">Colesterol (mg) </label>
                    {!! Form::text('cholesterol', null, array('placeholder' => 'Colesterol', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="potassium">Potasio (mg) </label>
                    {!! Form::text('potassium', null, array('placeholder' => 'Potasio', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="sodium">Sodio (mg) </label>
                    {!! Form::text('sodium', null, array('placeholder' => 'Sodio', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="zinc">Zinc (mg) </label>
                    {!! Form::text('zinc', null, array('placeholder' => 'Zinc', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="magnesium">Magnesio (mg) </label>
                    {!! Form::text('magnesium', null, array('placeholder' => 'Magnesio', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="vitamin_b6">Vitamina B6 (mg) </label>
                    {!! Form::text('vitamin_b6', null, array('placeholder' => 'Vitamina B6', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="vitamin_b12">Vitamina B12 (mg) </label>
                    {!! Form::text('vitamin_b12', null, array('placeholder' => 'Vitamina B12', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="folate_equivalents">Equivalentes de Folatos (microgg) </label>
                    {!! Form::text('folate_equivalents', null, array('placeholder' => 'Equivalentes de Folatos', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                </div>
               <div class="form-group">
                    <label for="source">Fuente</label>
                    {!! Form::text('source', null, array('placeholder' => 'Fuente', 'class'=>'form-control', 'required' => 'required', 'autofocus' => 'autofocus' )) !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('added_by') !!}
                    {!! Form::hidden('modified_by') !!}
                </div>
                {!! Form::submit('Actualizar', array('class' => 'btn btn-block btn-primary')) !!}
                {!! Form::close() !!}
                </div>
        </div>
    @stop
