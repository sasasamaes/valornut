@extends('app')

@section('title')
Ayuda
@stop

@section('content')
            <div id="content-wrapper"  class="panel panel-success">
                <div class="panel-heading">
                    <h2>
                        Ayuda
                    </h2>
                </div>
                <div class="panel-body container-fluid">
                            {!! Form::open(array('url' => 'https://pagos.fundacionucr.ac.cr/pago.php')) !!}
                                {!! Form::text('usuario', 'alfonso') !!}
                                {!! Form::text('protein', null, array('placeholder' => 'Prote&iacute;na', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                {!! Form::text('protein', null, array('placeholder' => 'Prote&iacute;na', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                {!! Form::text('protein', null, array('placeholder' => 'Prote&iacute;na', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                {!! Form::text('protein', null, array('placeholder' => 'Prote&iacute;na', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                                {!! Form::text('protein', null, array('placeholder' => 'Prote&iacute;na', 'class'=>'form-control', 'autofocus' => 'autofocus' )) !!}
                            {!! Form::close() !!}
                </div>
            </div>

@stop
