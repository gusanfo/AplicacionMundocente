<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mundocente</title>
    <link href="{{ asset('/css/cardio.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/select2.min.js') }}"></script>
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
               
            </div>
    </div>
    </header>
    <br>
    <br>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    <strong> Usuarios: </strong>{{$users->count()}} <br>
                        <hr>
                    @if($users->count())
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telfono</th>
                            <th>Universidad</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefono}}</td>
                                <td>{{ $user->universidad}}</td>


                                <td>
                                    <a href="#!" class="btn btn-success">Activar</a>
                                    <a href="#!" class="btn btn-danger">Eliminar</a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p> No se han encontrado Resultados </p>
                    @endif
                    {!!$users->render()!!}

                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['admin.update', ':USER_ID'], 'method' => 'PUT', 'id' => 'form-active']) !!}
    {!! Form::close() !!}



    <script>
        $(document).ready(function () {

            $('.btn-success').click(function (e) {

                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-active');
                var url = form.attr('action').replace(':USER_ID', id);
                var data = form.serialize();

                 row.fadeOut();

                $.post(url, data, function (result) {
                }).fail(function () {
                    alert('El usuario no fue eliminado');
                    row.show();
                });
            });
        });
    </script>
