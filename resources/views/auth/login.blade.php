@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
<<<<<<< HEAD
							<strong>¡Lo sentimos!</strong> Hubo algunos problemas con su entrada.<br><br>
=======
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
>>>>>>> pb/master
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
<<<<<<< HEAD
							<label class="col-md-4 control-label">E-Mail</label>
=======
							<label class="col-md-4 control-label">E-Mail Address</label>
>>>>>>> pb/master
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
<<<<<<< HEAD
							<label class="col-md-4 control-label">Contraseña</label>
=======
							<label class="col-md-4 control-label">Password</label>
>>>>>>> pb/master
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
<<<<<<< HEAD
										<input type="checkbox" name="remember">Recordarme
=======
										<input type="checkbox" name="remember"> Remember Me
>>>>>>> pb/master
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">

<<<<<<< HEAD
								 <button type="submit" class="btn btn-primary">Entrar</button>
								<a class="btn btn-link" href="{{ url('/password/email') }}">Olvido su Contraseña?</a>
=======
								 <button type="submit" class="btn btn-primary">Login</button>
								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
>>>>>>> pb/master
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
