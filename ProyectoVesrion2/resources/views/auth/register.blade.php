
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mundocente</title>
	<link href="{{ asset('/css/cardio.css') }}" rel="stylesheet">
	<!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->

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
									<li class="active"><a href="#usuarios" data-toggle="tab" id="tab2">Usuarios</a></li>
									<li><a href="#administrador" data-toggle="tab" id="tab3">Administrador</a></li>
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
							<div class= "tab-pane fade" id="administrador">
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
										@foreach ($areas as $area)
											<option value="{{$area->nombre}}">{{$area->nombre }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Que deseas hacer</label>
								<div class="col-md-6">

									<select name="tipoUser" class="form-control input-group-sm"  id="tipoUser">
										<option value="Publicar">Publicar</option>
										<option value="Buscar">Buscar</option>

									</select>
								</div>

							</div>
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


@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#areas").select2({
				maximumSelectionLength: 2,
				placeholder: "Select un area"
			});
		});

	</script>
@endsection	

<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/js/wow.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/typewriter.js') }}"></script>
	<script src="{{ asset('/js/jquery.onepagenav.js') }}"></script>
	



</body>
</html>