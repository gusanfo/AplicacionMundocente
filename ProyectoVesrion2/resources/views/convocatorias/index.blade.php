@extends('app')



@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-heading">Convocatorias</div>

                    <div class="panel-body">



                        <a href="{{url('/convocatorias/create')}}" class="btn btn-success">CREAR</a>



                        {!! Form::open(['route' => 'revistas.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}

                        <div class="form-group">

                            {!! Form::text('areas',null,['class'=>'form-control', 'placeholder'=>'Areas'])  !!}

                        </div>

                        <button type="submit" class="btn btn-default">Buscar</button>

                        {!!Form::close()!!}

                        <hr>

                        @if($convocatorias ->count())

                            @foreach ($convocatorias as $convocatoria)

                                <div class="panel panel-default">

                                    <div class="panel-heading">{{ $convocatoria->universidad }}</div>

                                    <div class="panel-body">



                                        <h2><a>{{ $convocatoria->titulo }}</a></h2>

                                        <h4 class="pull-right">{{ $convocatoria->areas }}</h4>



                                        <ul class="list-unstyled">

                                            <li> {{App\Http\Controllers\RevistaController::getNombre($convocatoria->ciudad)}}

                                            </li>

                                            <li>Fecha Inicio:{{date("F j, Y", strtotime($convocatoria->fecha_inicio))}}</li>

                                            <li>Fecha Fin: {{date("F j, Y", strtotime($convocatoria->fecha_finalizacion))}}</li>

                                            <li>{{$convocatoria->descripcion}}</li>

                                            <li><a href="{{ $convocatoria->enlace }}" target="_blank"

                                                   class="btn pull-right">Mas Información</a></li>



                                        </ul>

                                    </div>

                                </div>

                            @endforeach

                        @else

                            <p> No se han encontrado Resultados </p>

                        @endif

                        {!!$convocatorias->render()!!}





                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection