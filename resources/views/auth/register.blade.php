@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
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

						<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-4 control-label">Nombre</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Contaseña</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
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
									<select name="areas" class="form-control input-group-sm" multiple="multiple" id="areas">
										@foreach ($areas as $area)
											<option value="{{$area->nombre}}">{{$area->nombre }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Que deseas hacer</label>
								<div class="col-md-6">
									<div class="input-group">
										 <span class="input-group-addon">
									<input type="checkbox" name="accion"  value="buscar" id="buscar">Buscar
										 </span>
										<span class="input-group-addon">
									<input type="checkbox" name="accion"  value="publicar" id="publicar">Publicar
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										Registrar
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
@section('scripts')
	<link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#areas").select2({
				maximumSelectionLength: 2,
				placeholder: "Select un area"
			});
		});

	</script>
@endsection