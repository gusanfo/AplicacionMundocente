<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mundocente</title>
    <link href="{{ asset('/css/cardio.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script src="/js/jquery.min.js'"></script>

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

        <!--Inicio de header -->
        <div class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">     
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>       
                            <img src="{{ asset('images/logo.png') }}" id="homeimage">
                                  
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" style="padding-top:20px">
                                <li><a id="fonte" data-toggle="modal" data-target="#ModalUniversidad">Gestionar Universidades</a></li>
                                <li><a id="fonte1" data-toggle="modal" data-target="#ModalAreas">Gestionar Áreas</a></li>
                            </ul>
                            
                            <ul class="nav navbar-nav navbar-right" style="padding-top:20px">   
                                <li class="dropdown">
                                    <a id="fonte5" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  {{ Auth::user()->name }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/auth/logout') }}">Salir</a></li>
                                        </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
        </div>
        <!--Fin de header-->

<!--Inicio de ventanas modal gestion de universidad-->
<div id="ModalUniversidad" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-popup2">
            <div class="modal-header">
                <h4 class="modal-title white">Agregar Universidad</h4>
            </div>
            <div class="modal-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                        <p>Por favor corrige los errores:</p>
                        <ul>
                            @foreach($errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach

                            @endif
                        </ul>
                    </div>
                <form name="formR" class="form-horizontal" role="form" method="POST"
                      action="{{ url('/admin') }}">
                    <div class="col-md-10">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control" placeholder="Ejemplo: Universidad Nacional" name="u" id="u">
                    </div>
                    <button type="submit" class="btn btn-submit" id="entrarbutton">Agregar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!--Fin de ventanas modal gestion de universidad-->

 <!--Inicio de ventanas modal gestion de Areas-->
<div id="ModalAreas" class="modal fade" role="dialog" >
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-popup2">
            <div class="modal-header">
                <h4 class="modal-title white">Agregar Área</h4>
            </div>
            <div class="modal-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                        <p>Por favor corrige los errores:</p>
                        <ul>
                            @foreach($errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach

                            @endif
                        </ul>
                    </div>
                   
                    <form name="formR" class="form-horizontal" role="form" method="POST"
                          action="{{ url('/admin') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-6">
                    <select name="nombre" class="form-control input-group-sm" id="areas">
                        @foreach ($areas2 as $ar)

                            <option value="{{$ar->nombre}}">{{$ar->nombre }}</option>

                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-5">
                    <input type="text" name="tipo" class="form-control" placeholder=""  id="tipo">

                </div>
                    <button type="submit" name="addArea" class="btn btn-submit" id="entrarbutton">Agregar</button>
               
                   </form>
                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!--Fin de ventanas modal gestion de Areas-->    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

             @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('flash_message')  }}
                    </div>

                @endif
                @if(Session::has('flash_messageD'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('flash_messageD')  }}
                    </div>

                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>

                    <strong> Usuarios: </strong>{{$users->count()}} <br>
                        <hr>
                    @if($users->count())
                    <table class="table table-striped">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telfono</th>
                            <th>Cargo</th>
                            <th>Universidad</th>
                            <th>Acciones</th>
                           <!-- <th>Notificar</th> -->
                        </tr>
                        @foreach ($users as $user)
                            <tr data-id="{{ $user->id }}">
                               
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telefono}}</td>
                                <td>{{ $user->cargo}}</td>
                                <td>{{ $user->universidad}}</td>
							

                                <td>
                                    {!! Form::open(['route' => ['admin.update', ':USER_ID'], 'method' => 'PUT', 'id' => 'form-active']) !!}
                                    <a href="#!" class="btn btn-success">Activar</a>
                                    {!! Form::close() !!}

                                    {!! Form::open(['route' => ['admin.destroy', $user], 'method' => 'DELETE']) !!}
                                  <!--  <a href="#!" class="btn btn-danger">Eliminar</a> -->
                                    <button type="submit" class="btn btn-danger" id="eliminar">
                                        Eliminar
                                    </button>
                                    {!! Form::close() !!}

                                </td>
                               <!--  <td>{{ $user->notificar}}</td> -->
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
  
    <script>
        $(document).ready(function () {
        	// $("#areas").select2();
        	 $('div.alert').delay(3000).slideUp(300);

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
                    alert('El usuario no fue procesado correctamente.');
                    row.show();
                });
            });
        });
    </script>

    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
   

</body>
</html>