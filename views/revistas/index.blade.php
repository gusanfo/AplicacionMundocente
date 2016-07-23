@extends('app')

@section('content')
    <div class="container-fluid">
        
        <div class="row">
            <!-- inicio version busqueda avanzada-->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading" id="revisP">Busqueda Avanzada</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'revistas.index', 'method'=>'GET', 'class'=>'navbar-form','role'=>'search']) !!}

                        <div class="form-group">
                            {!! Form::text('areas',null,['class'=>'form-control', 'placeholder'=>'areas'])  !!}
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            {!! Form::text('universidad',null,['class'=>'form-control', 'placeholder'=>'universidad'])  !!}
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-search"></span> Buscar</button>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
             <!-- fin version busqueda avanzada-->
            <div class="col-md-9">
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
                @if(Session::has('flash_messageW'))
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('flash_messageW')  }}
                    </div>

                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Revistas</div>
                    <div class="panel-body">

			



                        @if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
                        <a href="{{url('/revistas/create')}}" class="btn btn-success">CREAR</a>
                       @else
                           <a style="display: none" href="{{url('/revistas/create')}}" class="btn btn-success">CREAR</a>
                        @endif
                        {!! Form::open(['route' => 'revistas.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}

                        <div class="form-group">
                            {!! Form::text('type',null,['class'=>'form-control', 'placeholder'=>'palabra clave'])  !!}
                        </div>
                        <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span> Buscar</button>
                        {!!Form::close()!!}
                        <hr>
                        <br>
                        @if($revistas->count())
                        @foreach ($revistas as $revista)
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $revista->universidad }}</div>
				
				
                                <div class="panel-body">

                                    <h2>{{ $revista->titulo }}</h2>
                                    <h4  class="pull-right">{{ $revista->areas }}</h4>
                                    <ul class="list-unstyled">
                                        <li> {{$revista->ciudad}}
                                        </li>
                                        <li>{{ $revista->tipoRevista }} {{ "  " }} {{ $revista->categoria}} </li>
                                        <li><b>Recepción: </b>
                                        @if($revista->fechaRecepcion == '0000-00-00')
                                                {{'Permanente'}}
                                            @else
                                                {{date("F j, Y", strtotime($revista->fechaRecepcion ))}}
                                           @endif
                                        </li>
                                        <li><a href="{{ $revista->enlace }}" target="_blank"
                                               class="btn pull-right">Mas información</a>
                                        </li>
                                    </ul>
				    
                                </div>
                                 @if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
                                    <a href="{{ route('revistas.edit', $revista->id) }}" class="btn btn-warning pull-right"> Editar</a>
                                    <div  class="pull-right"  style="width:15px; height:15px;">  </div>
									{!! Form::open(['route' => ['revistas.destroy', $revista->id], 'method' => 'DELETE']) !!}
									<button type="submit" class="btn btn-danger pull-right" id="eliminar">
										Eliminar
									</button>
									{!! Form::close() !!}
                                @else

                                <a  style="display: none" href="{{ route('revistas.edit', $revista->id) }}" class="btn btn-warning pull-right"> Editar</a>
                                @endif
                            </div>
							<br>
                        @endforeach
                        @else
                            <p> No se han encontrado Resultados </p>
                        @endif
                       {!! $revistas->appends(Request::only(['type']))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('div.alert').delay(3000).slideUp(300);

        });

    </script>

@endsection