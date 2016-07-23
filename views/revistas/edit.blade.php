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



						{!! Form::model($revista, ['route' => ['revistas.update', $revista], 'method' => 'PUT']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							{!! Form::label('titulo', 'Titulo') !!}
							{!! Form::text('titulo', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group"  >
						{!! Form::label('areas', 'Areas') !!}
								<div class="form-group">
								
								{!! Form::text('areas', null, ['class' => 'form-control']) !!}
								</div>
								<div class="form-group" id="h">
								<select name="areas1[]" class="form-control input-group-sm" multiple="multiple" id="campoA" >
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
								
						</div>

							

						<div class="form-group" style="display: none">
							{!! Form::label('fechaRecepcion', 'Fecha Recepcion') !!}
							{!! Form::text('fechaRecepcion', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group">
							{!! Form::label('fechaRecepcion', 'Fecha Recepción') !!}
							<input type="date" class="form-control" name="fechaRecepcion" id="campoF">
						</div>
						<div class="form-group">
							{!! Form::label('tipoRevista', 'TipoRevista') !!}
							{!! Form::text('tipoRevista', null, ['class' => 'form-control']) !!}
						</div>

						<div class="form-group" id="cat">
							{!! Form::label('categoria', 'Categoria') !!}
							{!! Form::text('categoria', null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group" id="catg">
                                    <label class="col-md-4 control-label">Categoria</label>
                                    <div class="col-md-6">
                                        <select name="categoria" class="form-control input-group-sm" id="categoria" value="{{ old('Categoria') }}">
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                         </div>
                         
						<div class="form-group">
							{!! Form::label('enlace', 'Enlace') !!}
							{!! Form::text('enlace', null, ['class' => 'form-control']) !!}
						</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">

									<button type="submit" class="btn btn-primary" id="entrar2">
										Guardar Cambios
									</button>
									{!! Form::close() !!}	<!-- *** CERRAR EL FRM DE MODIFICAR -->

								</div>
							</div>



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
			//INICIO CAMBIO AREAS
			$("#campoA").select2({
                placeholder: "Select un area",
                allowClear: true,
                maximumSelectionLength: 3               
               
            });

			$('#h').hide();
			$( '#areas' ).on( 'click', function() {
                $('#areas').hide();
                $('#h').show();              
            });

			
            $("#campoA").on( 'change', function(){
			var valorSeleccionado = $( this ).val();
			 $("#areas").val(valorSeleccionado);
			//alert("Cambió la selección. El valor seleccionado es " + valorSeleccionado );
			});
      
			
	// FIN CAMBIO AREAS

	//cambio categoria

	$('#catg').hide();
			$( '#cat' ).on( 'click', function() {
                $('#cat').hide();
                $('#catg').show();
              	$("#cat").val(categoria.value);
            });
	//Fin cambio categoria

	//INICIO CAMBIO  FECHA R		
			$("#campoF").val(fechaRecepcion.value);
	//FIN CAMBIO  FECHAS  R
		});

	</script>
@endsection