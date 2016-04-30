@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>¡Lo sentimos!</strong> Hubo algunos problemas con su entrada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif



						{!! Form::model($user, ['route' => ['user.update', $user], 'method' => 'PUT']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							{!! Form::label('name', 'Nombre') !!}
							{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('email', 'Correo electrónico') !!}
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor introduzca su e-mail']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('telefono', 'Telefono') !!}
							{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}
						</div>


						<!--
							<div class="form-group">
								<label class="col-md-4 control-label">Nombre</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Telefono</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="telefono" id="telefono">
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-4 control-label">Contaseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" id="password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Confirmar Contraseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password_confirmation">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Areas</label>
								<div class="col-md-6">
									<select name="areas[]" class="form-control input-group-sm" multiple="multiple" id="areas">

											<option value="">area FALTA</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Que deseas hacer</label>
								<div class="col-md-6">

									<select name="tipoUser" class="form-control input-group-sm"  id="tipoUser">
										<option value="Buscar">Buscar</option>
										<option value="Publicar">Publicar</option>

									</select>
								</div>

							</div>

							<div class="form-group" id="uni">
								<label class="col-md-4 control-label">Univerisity</label>
								<div class="col-md-6">

									<select name="universidad" class="form-control input-group-sm"  id="universidad">
										<option value="">universidad FALTA </option>

									</select>
								</div>

							</div> -->

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary" id="entrar2">
										Guardar Cambios
									</button>
									 <a href="{{ url('/auth/logout') }}" class="btn btn-success" id="inactivar" >Inactivar</a>

								</div>
							</div>
							

						{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
	<link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/select2.min.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$( "#inactivar" ).click(function() {
			
			{{-- comentario --}}
			{{  App\Http\Controllers\userController::getInactivar() }}

			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#areas").select2({
				maximumSelectionLength: 2,
				placeholder: "Select un area"
			});
		});

	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#uni").hide();
			$("#tipoUser").change(function(){
				if($(this).val()=="Buscar"){
					$("#uni").hide();
				}else{
					$("#uni").show();
				}
			});
		});
	</script>
@endsection