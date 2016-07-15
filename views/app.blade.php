<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mundocente</title>
	<link href="{{ asset('/css/cardio.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/select2.min.js') }}"></script>
	

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
						<div class="col-md-12 text-left">
							<h3 class="light white">Mundocente, la comunidad de docentes universitarios</h3>
							<h3 class="white typed">Busca y publica eventos academicos, convocatorias o revistas</h3>
							<h4 class="light white">Registrate para disfrutar de todos nuestros contenidos</h4>
							<a href="{{ url('/auth/register') }}" class="btn btn-blue" id="iniciar">Comenzar Ahora</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


	<!-- prueba-->
	
	<section class="section">
		<div class="cut cut-top">
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-4  hidden-xs hidden-sm hidden-md">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Eventos Academicos</h5>
						<h5 class="white heading hide-hover">Encuentra congresos, seminarios, conferencias y demás eventos académicos de tu interés.</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular">Publicar Evento</h4>
							<h4 class="white heading small-pt"></h4>
							<a href="{{ url('/auth/register') }}" class="btn btn-white-fill expand">Publicar</a>
						</div>
					</div>
				</div>
				<div class="col-md-4  hidden-xs hidden-sm hidden-md">
					<div class="intro-table intro-table-hovertwo">
						<h5 class="white heading hide-hover">Convocatorias</h5>
						<h5 class="white heading hide-hover">Entérate oportunamente sobre las oportunidades laborales del ámbito universitario y cumple con tus metas de crecimiento profesional</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular">Publicar convocatoria</h4>
							<h4 class="white heading small-pt"></h4>
							<a href="{{ url('/auth/register') }}" class="btn btn-white-fill expand">publicar</a>
						</div>
					</div>
				</div>
				<div class="col-md-4  hidden-xs hidden-sm hidden-md">
					<div class="intro-table intro-table-hoverthree">
						<h5 class="white heading hide-hover">Revistas</h5>
						<h5 class="white heading hide-hover">Ahorra tiempo conociendo las mas inmportantes revistas científicas y tecnologicas que a la fecha reciben para publicación artículos de tu área de interés</h5>
						<div class="bottom">
							<h4 class="white heading small-heading no-margin regular">Publicar Revista</h4>
							<h4 class="white heading small-pt"></h4>
							<a href="{{ url('/auth/register') }}" class="btn btn-white-fill expand">Publicar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>

	<!--finprueba-->
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
						<!--<row>
							<div class="col-md-12">
								<ul class="nav nav-tabs nav-justified">
									<li class="active"><a href="#usuarios" data-toggle="tab" id="tab2">Usuarios</a></li>

								</ul>
							</div>
						</row>-->

						
							<div class= "tab-pane fade in active" id="usuarios">
								
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

	@else
						 
		
	<html>
			<head>
				<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
			</head>
			<body>
				<div class="navbar navbar-default navbar-fixed-top">
					<div class="container-fluid">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

								<a href="{{ url('/')}}">
							 	<img src="{{ asset('images/logo.png') }}" id="homeimage">
							 	</a>	
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav" style="padding-top:20px">
								<li><a id="fonte" href="{{url('/revistas')}}">Revistas</a></li>
								<li><a id="fonte1"href="{{url('/convocatorias')}}">Convocatorias</a></li>
								<li><a id="fonte2"href="{{url('/eventoAcademico')}}">Eventos Academicos</a></li>

							</ul>
							
							<ul class="nav navbar-nav navbar-right" style="padding-top:20px">
								
								<li class="dropdown">
									
									<h4 id="fonte4" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  {{ Auth::user()->name }} <span class="caret"></span></h4>
									<ul class="dropdown-menu">
										<li><a href="{{ route('user.edit', App\Http\Controllers\userController::getId()) }}">Editar Perfil</a></li>
										
										<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
										
									</ul>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</body>
		</html>
		<br>
		<br>
		<br>
		<br>
		<br>			
	@endif

	@yield('content')
	{!! Html::script('js/jquery.js') !!}

	@yield('scripts')

	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	
	
	
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
	<script src="{{ asset('/js/jquery.onepagenav.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
	<!-- -->
	<script src="{{ asset('/js/cbpAnimatedHeader.js') }}"></script>
	<script src="{{ asset('/js/jquery.appear.js') }}"></script>
	<script src="{{ asset('/js/SmoothScroll.min.js')}}"></script>
	<script src="{{ asset('/js/mooz.themes.scripts.js')}}"></script>

</body>
</html>

