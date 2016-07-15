@extends('app')

@section('content')

    <div class="container-fluid">
        
        <div class="row">
            <!-- inicio version busqueda avanzada-->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading" id="revisP">Busqueda Avanzada</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'convocatorias.index', 'method'=>'GET', 'class'=>'navbar-form','role'=>'search']) !!}
 <div class="form-group">
                            {!! Form::text('areas',null,['class'=>'form-control', 'placeholder'=>'areas'])  !!}
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            {!! Form::text('ciudad',null,['class'=>'form-control', 'placeholder'=>'ciudad'])  !!}
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

                    <div class="panel-heading">Convocatorias</div>

                    <div class="panel-body">

        @if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
                            <a href="{{url('/convocatorias/create')}}" class="btn btn-success">CREAR</a>
                        @else
                            <a style="display: none" href="{{url('/convocatorias/create')}}" class="btn btn-success">CREAR</a>
                        @endif


                        {!! Form::open(['route' => 'convocatorias.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}

                        <div class="form-group">

                            {!! Form::text('type',null,['class'=>'form-control', 'placeholder'=>'palabra clave'])  !!}

                        </div>

                        <button type="submit" class="btn btn-default">
                         <span class="glyphicon glyphicon-search"></span> Buscar</button>

                        {!!Form::close()!!}

                        <hr>
        <br>
                        @if($convocatorias ->count())
						
                            @foreach ($convocatorias as $convocatoria)

                                <div class="panel panel-default">

                                    <div class="panel-heading">{{ $convocatoria->universidad }}</div>

                                    <div class="panel-body">



                                        <h2>{{ $convocatoria->titulo }}</h2>

                                        <h4 class="pull-right">{{ $convocatoria->areas }}</h4>



                                        <ul class="list-unstyled">

                                            <li> {{$convocatoria->ciudad}}

                                            </li>

                                            <li><B>Inicio: </B> {{date("F j, Y", strtotime($convocatoria->fecha_inicio))}}</li>

                                            <li><B>Finaliza: </B> {{date("F j, Y", strtotime($convocatoria->fecha_finalizacion))}}</li>

                                            <li>{{$convocatoria->descripcion}}</li>

                                            <li><a href="{{ $convocatoria->enlace }}" target="_blank"

                                                   class="btn pull-right">Mas Información</a></li>



                                        </ul>

                                    </div>
   								 @if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
                                    <a href="{{ route('convocatorias.edit', $convocatoria->id) }}" class="btn btn-warning pull-right"> Editar</a>
                                     <div  class="pull-right"  style="width:15px; height:15px;">  </div>
                                    {!! Form::open(['route' => ['convocatorias.destroy', $convocatoria->id], 'method' => 'DELETE']) !!}
                                    <button type="submit" class="btn btn-danger pull-right" id="eliminar">
                                        Eliminar
                                    </button>
                                    {!! Form::close() !!}
                                @else

                                <a  style="display: none" href="{{ route('convocatorias.edit', $convocatoria->id) }}" class="btn btn-warning pull-right"> Editar</a>
                                @endif

                                </div>
									<br>
                            @endforeach

                        @else

                            <p> No se han encontrado Resultados </p>

                        @endif
 			{!! $convocatorias->appends(Request::only(['type']))->render() !!}
            
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
