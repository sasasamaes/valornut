@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registrarse en Valornut</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oops!</strong> Por favor corrija los campos resaltados.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Primer Apellido</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name_1" value="{{ old('last_name_1') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Segundo Apellido</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name_2" value="{{ old('last_name_2') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo electr&oacute;nico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tel&eacute;fono</label>
							<div class="col-md-6">
								<input type="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}">
							</div>
						</div>
                        &nbsp;{!! Form::hidden('receive_emails', false) !!}
						<div class="form-group">
							<label class="col-md-4 control-label">Recibir Correos</label>
							{!! Form::checkbox('receive_emails', true) !!}
						</div>




						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
                                {!! Form::hidden('usuario', 'example@gmail.com') !!}
                                {!! Form::hidden('monto', '5000') !!}
                                {!! Form::hidden('proyecto', '1497') !!}
                                {!! Form::hidden('sistema', '4') !!}
                                {!! Form::hidden('tramite', 'af01') !!}
                                {!! Form::hidden('descripcion', 'Test') !!}
                                {!! Form::hidden('nombre', 'Alfonso') !!}
                                {!! Form::hidden('nomFactura', 'Alfonso Alfaro') !!}
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrarse
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
