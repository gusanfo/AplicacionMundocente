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

						<div class="form-group" id="passw">
							{!! Form::label('password', 'Contraseña') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}
							<button type="button"  class="btn btn-info glyphicon glyphicon-edit" id="changePass">
							</button>
						</div>


						@if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
							<div class="form-group" id="uOld" style="display: none">
								{!! Form::label('universidad', 'Universidad') !!}
								{!! Form::text('universidad', null, ['class' => 'form-control' ]) !!}

								<button type="button"  class="btn btn-info glyphicon glyphicon-edit" id="changeU">
								</button>
							</div>

							<div class="form-group" id="uni">
								{!! Form::label('universidad', 'Universidad') !!}

								<select name="universidad" class="form-control input-group-sm" id="campoU">
									@foreach ($universidades as $universidad)
										<option value="{{$universidad->nombre}}">{{$universidad->nombre }}</option>
									@endforeach
								</select>

							</div>


							<div class="form-group" id="cOld">
								{!! Form::label('cargo', 'Cargo') !!}
								{!! Form::text('cargo', null, ['class' => 'form-control' ]) !!}

							</div>



							<div class="form-group " style="display: none">
								{!! Form::label('areas', 'Areas') !!}
								{!! Form::text('areas', null, ['class' => 'form-control']) !!}
								<button type="button"  class="btn btn-info glyphicon glyphicon-edit" id="changeA">
								</button>
							</div>

							<div class="form-group" id="are" style="display: none">

								<select name="areas[]" class="form-control input-group-sm" multiple="multiple" id="campoA">
									@foreach ($areas2 as $ar)
										<optgroup label="{{$ar->nombre}}">
											@foreach($areas as $total)
												@if($total->tipo == $ar->nombre)

													<option value="{{$total->nombre}}">{{$total->nombre }}</option>

												@endif
											@endforeach
										</optgroup>
									@endforeach
								</select>

							</div>

							<div class="form-group"  style="display: none">

								<select name="tipoUser" class="form-control input-group-sm"  id="tipoUser">
									<option value="Publicar">Publicar</option>
									<option value="Buscar">Buscar</option>

								</select>


							</div>

						@else
							<div class="form-group" id="uOld" style="display: none">
								{!! Form::label('universidad', 'Universidad') !!}
								{!! Form::text('universidad', null, ['class' => 'form-control' ]) !!}

								<button type="button"  class="btn btn-info glyphicon glyphicon-edit" id="changeU">
								</button>
							</div>

							<div class="form-group" id="uni" style="display: none">
								<select name="universidad" id="campoU">
									@foreach ($universidades as $universidad)
										<option value="{{$universidad->nombre}}">{{$universidad->nombre }}</option>
									@endforeach
								</select>

							</div>
							<div class="form-group" style="display: none">
								{!! Form::label('cargo', 'Cargo') !!}
								{!! Form::text('cargo', null, ['class' => 'form-control' ]) !!}

							</div>

							<div class="form-group" >
								{!! Form::label('areas', 'Areas') !!}
								{!! Form::text('areas', null, ['class' => 'form-control']) !!}
								<button type="button"  class="btn btn-info glyphicon glyphicon-edit" id="changeA">
								</button>
							</div>

							<div class="form-group" id="are" >

								<select name="areas[]" class="form-control input-group-sm" multiple="multiple" id="campoA">
									@foreach ($areas2 as $ar)
										<optgroup label="{{$ar->nombre}}">
											@foreach($areas as $total)
												@if($total->tipo == $ar->nombre)

													<option value="{{$total->nombre}}">{{$total->nombre }}</option>

												@endif
											@endforeach
										</optgroup>
									@endforeach
								</select>

							</div>
							<select name="tipoUser" class="form-control input-group-sm"  id="tipoUser" style="display: none">

								<option value="Buscar">Buscar</option>
								<option value="Publicar">Publicar</option>

							</select>
						@endif
						<div class="form-group">

							<div class="col-md-6">
							
								 <input  type="checkbox"  name="notificar" id="notificar">    Recibir notificaciones por correo

							</div>

						</div>

						
						<div class="form-group" style="display: none">
							{!! Form::label('estado', 'estado') !!}
							{!! Form::text('estado', null, ['class' => 'form-control']) !!}
						</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary" id="entrar2">
										Guardar Cambios
									</button>


										<button type="submit" class="btn btn-danger" id="inactivar" >
											Inactivar
										</button>



								</div>
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

	<script>
		$(document).ready(function(){

			$("#notificar").click(function(){
				$("#notificar").val('1');
			});

			//****** Start inactivar
			$("#inactivar").click(function(){
				$("#estado").val('0');

			});
			//****** End inactivar

			//****** Start change Univ
			$("#campoU").val(universidad.value).select2();

			//****** End change Univ


			//****** Start change Password
			password.disabled = true;
			$( "#changePass" ).click(function() {
				password.disabled = false;
			});
			//****** END change Password

			$("#campoA").select2({
				maximumSelectionLength: 2,
				placeholder: "Seleccione un tema de interes"

			});
			$("#are").hide();
			areas.disabled = true;

			$( "#changeA" ).click(function() {
				$("#changeA").hide();
				$("#are").show();
				$("#areas").hide();
				$("#campoA").val(areas.value);
			});

			//****** End change Area

		});
	</script>


@endsection
