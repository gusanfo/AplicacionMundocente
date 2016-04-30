@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Eventos Academicos</div>
                    <div class="panel-body">


                         @if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
                            <a href="{{url('/eventoAcademico/create')}}" class="btn btn-success">CREAR</a>
                        @else
                            <a style="display: none" href="{{url('/eventoAcademico/create')}}" class="btn btn-success">CREAR</a>
                        @endif
                        
                        {!! Form::open(['route' => 'eventoAcademico.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}

                        <div class="form-group">
                            {!! Form::text('type',null,['class'=>'form-control', 'placeholder'=>'search'])  !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!!Form::close()!!}
                        <hr>
                        <br>
                        @if($eventosAcademicos->count())
                            @foreach ($eventosAcademicos as $eventoAcademico)
                                <div class="panel panel-default">
                                    <div class="panel-heading">{{ $eventoAcademico->universidad }}</div>
                                    <div class="panel-body">

                                        <h2>{{ $eventoAcademico->titulo }}</h2>
                                        <h4 class="pull-right">{{ $eventoAcademico->areas }}</h4>

                                        <ul class="list-unstyled">
                                            <li>{{ $eventoAcademico->ciudad}}
                                            </li>
                                            <li>{{date("F j, Y", strtotime( $eventoAcademico->fecha_inicio ))}}</li>
                                             <li>{{date("F j, Y", strtotime( $eventoAcademico->fecha_fin ))}}</li>
                                            <li><a href="{{ $eventoAcademico->enlace }}" target="_blank"
                                                   class="btn pull-right">Mas información</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p> No se han encontrado Resultados </p>
                        @endif
                        {!!$eventosAcademicos->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection