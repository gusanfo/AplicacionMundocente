<!DOCTYPE html>
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

	<script  type="text/javascript">
		
	</script>

	<div class="preloader">
		<img src="{{ asset('/images/loader.gif') }}" alt="Preloader image">
	</div>
	@if (Auth::guest())
	<nav class="navbar">
		
		<div class="container">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" data-active-url="{{ asset ('images/logo-active.png') }}" alt="" class="prueba1"></a>
			</div>
			
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					
					<li><a href="#services">Servicios</a></li>
					<li><a href="#team">Publicaciones</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue" id="iniciar">Ingresar</a></li>
				</ul>
			</div>

			
		</div>
		

	</nav>

	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Mundocente</h3>
							<h2 class="white typed">Ofrecemos información valiosa a los pofesores universitarios para mejorar su carrera docente.</h2>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	

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

	@else
							
							
								<!-- <nav class="navbar navbar-inverse">
							<a href="{{ url('/')}}" class="dropdown pull-left" id="homeDw">
								<img src="{{ asset('images/logo-active.png') }}" id="homeimage">
							</a>							
    						<li class="dropdown pull-right" id="userDw">
    							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" id="usuariocss">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
								</ul>
							</li>
								</nav>
							 -->
							 <html>
							 	<head>
							 		<title></title>
							 	</head>
							 	<body>
							 		<div class="navbar navbar-default navbar-fixed-top">
							 			<div class="row">
							 				<div class="col-md-10">
							 					<ul class="lista">
							 						<li class="dropdown pull-left">
							 							<a href="{{ url('/')}}">
							 								<img src="{{ asset('images/logo-active.png') }}" id="homeimage">
							 							</a>	
							 						</li>
							 						<li class="elementos"><a href="{{url('/revistas')}}">Revistas</a></li>
							 						<li class="elementos"><a href="{{url('/eventoAcademico')}}">Eventos </a></li>
							 						<li class="elementos"><a href="{{url('/convocatorias')}}">Convocatorias </a></li>
							 					</ul>
											</div>
										<div class="col-md-2">
											<li class="dropdown pull-right" id="userDw">
												<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" id="usuariocss">{{ Auth::user()->name }} <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
												</ul>
											</li>
							 			</div>	
							 			</div>
							 		</div>
							 	</body>
							 	<br>
							 	<br>
							 	<br>
							 	<br>
							 	<br>
							 	<br>
							 	<br>
							 </html>



							
		@endif

		




	@yield('content')
	{!! Html::script('js/jquery.js') !!}
	{!! Html::script('js/dropdown.js') !!}
	{!! Html::script('js/dropdownU.js') !!}
	@yield('scripts')

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
	<script src="{{ asset('/js/main.js') }}"></script>

</body>
</html>

