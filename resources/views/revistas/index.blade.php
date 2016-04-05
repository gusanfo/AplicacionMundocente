@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Revistas</div>
                    <div class="panel-body">

                        <a href="{{url('/revistas/create')}}" class="btn btn-success">CREAR</a>
                        {!! Form::open(['route' => 'revistas.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}

                        <div class="form-group">
                            {!! Form::text('areas',null,['class'=>'form-control', 'placeholder'=>'Areas'])  !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!!Form::close()!!}
                        <hr>

                        @if($revistas->count())
                        @foreach ($revistas as $revista)
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $revista->universidad }}</div>
                                <div class="panel-body">

                                    <h2>{{ $revista->titulo }}</h2>
                                    <h4  class="pull-right">{{ $revista->areas }}</h4>
                                    <ul class="list-unstyled">
                                        <li> {{App\Http\Controllers\RevistaController::getNombre($revista->ciudad)}}
                                        </li>
                                        <li>{{ $revista->tipoRevista }} {{ " - " }} {{ $revista->categoria}} </li>
                                        <li>@if($revista->fechaRecepcion == '0000-00-00')
                                                {{'Permanente'}}
                                            @else
                                                {{date("F j, Y", strtotime($revista->fechaRecepcion ))}}
                                           @endif
                                        </li>
                                        <li><a href="{{ $revista->enlace }}" target="_blank"
                                               class="btn btn-info pull-right">Mas Informacion</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        @endforeach
                        @else
                            <p> No se han encontrado Resultados </p>
                        @endif
                        {!!$revistas->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection