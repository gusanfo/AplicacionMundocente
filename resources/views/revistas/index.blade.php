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
                            {!! Form::text('nombre ',null,['class'=>'form-control', 'placeholder'=>'Search'])  !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!!Form::close()!!}
                        <hr>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">

                                <th>Nombre</th>
                                <th>Universidad</th>
                                <th>Fecha</th>
                                <th>Enlace</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($revistas as $revista)
                                <tr>
                                    <td>{{ $revista->universidad }}</td>
                                    <td>{{ $revista->nombre }}</td>
                                    <td>{{ $revista->fecha_limite }}</td>
                                    <td><a href="{{ $revista->enlace }}" target="_blank"
                                           class="btn btn-info">Visitar</a></td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection