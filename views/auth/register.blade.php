
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mundocente</title>
	<link href="{{ asset('/css/cardio.css') }}" rel="stylesheet">
<!--	<link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/select2.min.js') }}"></script>
-->	
	<script src="/js/jquery.min.js'"></script>
	 <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<link rel="icon" type="image/png" href="{{ asset('/images/favicons/favicon-32x32.png') }}" sizes="32x32">
	
	
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/normalize.css') }}">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.css') }}">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome-4.1.0/css/font-awesome.min.css') }}">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/eleganticons/et-icons.css') }}">
	<!-- Main style -->
	
	<!-- Fonts -->
</head>
<body>

	<header>
	<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left main-nav">
					<li><a href="{{ url('/auth/login') }}"><img src="{{ asset('images/logo.png') }}" alt="" class="prueba1"></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue" id="iniciar">Ingresar</a></li>
				</ul>
			</div>
	</div>
	</header>
	<br>
	<br>

	<div class="modal fade" id="modal1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Iniciar Sesión</h3>
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
					<div>
						<row>
							<div class="col-md-12">
								<ul class="nav nav-tabs nav-justified">
									
								</ul>
							</div>
						</row>

						<div class="tab-content">
							<div class= "tab-pane fade in active" id="usuarios">
								<br>
								<br>
								<form class="popup-form" role="form" method="POST" action="{{ url('/auth/login') }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<input type="email" class="form-control form-white" placeholder="correo electronico"name="email" value="{{ old('email') }}">
									<input type="password" class="form-control form-white" placeholder="contraseña"name="password">
									<div class="checkbox">	
										<input type="checkbox" value="None" id="squaredOne" name="remember">
										<label for="squaredOne" id="logincolor3"><span>Recordarme</span></label>
									</div>

									<button type="submit" class="btn btn-submit" id="entrarbutton">Entrar</button>
									<div class="row">
										<a class="btn btn-link white" id="logincolor1" href="{{ url('/password/email') }}">Olvido su Contraseña?</a>
									</div>
									<div class="row">
										<a class="btn btn-link white" id="logincolor2" href="{{ url('/auth/register') }}">No tienes una cuenta? Registrate</a>
									</div>	
								</form>
							</div>
							
						</div>
					</div>
			</div>
		</div>
							
		</div>

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
							
							<img src={{ asset('/images/LogoMundocente.png') }} id="imagen">						
							<h4 style="text-align:center">Crear una cuenta nueva</h4>
							<h5 style="text-align:center">Registrate y forma parte de la comunidad de docentes mas grande de Colombia</h5>
						
							<br>
							
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
									<input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}">
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
								<label class="col-md-4 control-label">Que deseas hacer</label>
								<div class="col-md-6">

									<select name="tipoUser" class="form-control input-group-sm"  id="tipoUser">
										<option value="Buscar">Buscar</option>	
										<option value="Publicar">Publicar</option>	
																		
									</select>
									
								</div>

							</div>
							<div class="form-group" id="ar" >
								<label class="col-md-4 control-label">Areas</label>
								<div class="col-md-6" >
								
									<select name="areas[]" class="form-control input-group-sm" multiple="multiple" id="areas">
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
							
							<div class="form-group" id="carg">
								<label class="col-md-4 control-label">Cargo</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="cargo" value="{{ old('cargo') }}" id="cargo">
								</div>
							</div>

							<div class="form-group" id="uni">
								<label class="col-md-4 control-label">Universidad</label>
								<div class="col-md-6">
									<select name="universidad" class="univ col-sm-12" id="universidad" style="width:100%">
										
										 @foreach ($universidades as $universidad)
                                                <option value="{{$universidad->nombre}}">{{$universidad->nombre }}</option>

                                         @endforeach
										
									</select>
								</div>								

							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"></label>
							
                                	<div class="col-md-6">                                                                                
                                  		<input  type="checkbox"  name="notificar" id="notificar">    Recibir notificaciones por correo

                                	</div>

                            </div>

							<br>
							<br>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary" id="entrar2">
										Crear Cuenta
									</button>
								</div>
							</div>

					</form>
					

				</div>
			</div>
		</div>
	</div>

</div>

	<script type="text/javascript">
		$(document).ready(function(){
			//alert('entro a tipo')
			$("#uni").hide();
			$("#carg").hide();
			
			
			$("#tipoUser").change(function(){
				if($(this).val()=="Buscar"){
					$("#uni").hide();
					$("#carg").hide();
					$("#ar").show();
					$("#areas").val();
				}else{
					$("#carg").show();
					$("#uni").show(100, function(){$(".univ").css("width", "100%");});
					$("universidad").val();
					$("#ar").hide();
				}
			});
			
		});

	</script>	

   <!-- <link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/select2.min.js') }}"></script>-->

	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/dropdown.js') }}"></script>
	<script src="{{ asset('js/dropdownU.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#notificar").click(function(){
				$("#notificar").val('1');
			});

			$("#areas").select2({
				maximumSelectionLength: 3,
				placeholder: "Seleccione un area de su interes por favor"
			});
			$("#universidad").select2({
				placeholder: "Seleccione una universidad"
			});
		});

	</script>

	<script type="text/javascript">

	$("#name").keypress(function (key) {
		window.console.log(key.charCode)
		if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
			&& (key.charCode < 65 || key.charCode > 90) //letras minusculas
			&& (key.charCode != 241) //ñ
			&& (key.charCode != 209) //Ñ
			&& (key.charCode != 32) //espacio
			&& (key.charCode != 225) //á
			&& (key.charCode != 233) //é
			&& (key.charCode != 237) //í
			&& (key.charCode != 243) //ó
			&& (key.charCode != 250) //ú
			&& (key.charCode != 193) //Á
			&& (key.charCode != 201) //É
			&& (key.charCode != 205) //Í
			&& (key.charCode != 211) //Ó
			&& (key.charCode != 218) //Ú

	)
		return false;
	});

	$("#telefono").keypress(function (key) {
		window.console.log(key.charCode)
		if (key.charCode < 48 || key.charCode > 57)//numeros 0 al 9
	
		return false;
	});
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	
	
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/js/wow.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/typewriter.js') }}"></script>
	<script src="{{ asset('/js/jquery.onepagenav.js') }}"></script>	

</body>
</html>