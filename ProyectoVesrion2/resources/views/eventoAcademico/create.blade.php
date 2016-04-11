@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Eventos Academicos</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <p>Por favor corrige los errores:</p>
                                <ul>
                                    @foreach($errors->all() as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach

                                    @endif
                                </ul>
                            </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/eventoAcademico') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Departamento</label>
                                    <div class="col-md-6">

                                        <select name="departamento" class="form-control input-group-sm" id="departamento">
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{$departamento->id}}" selected="selected">{{$departamento->nombre }}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Ciudad</label>
                                    <div class="col-md-6">

                                        <select name="ciudad" class="form-control input-group-sm" id="ciudad">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Universidad</label>
                                    <div class="col-md-6">

                                        <select name="universidad" class="form-control input-group-sm" id="universidad" >

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Areas</label>
                                    <div class="col-md-6">

                                        <select name="areas[]" class="form-control input-group-sm" id="areas"  multiple="multiple">
                                            <!--<optgroup label="System"> -->
                                            @foreach ($areas as $area)
                                                <option value="{{$area->nombre}}">{{$area->nombre }}</option>

                                                @endforeach
                                                        <!--  </optgroup> -->
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Titulo</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="titulo" id="titulo">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_evento"  id="fecha_evento">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Enlace</label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" name="enlace" id="enlace">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Publicar
                                        </button>
                                    </div>
                                </div>
                            </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <link href="{{ asset('/js/select2.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#areas").select2({
                maximumSelectionLength: 2,
                placeholder: "Select un area"
            });
        });

    </script>
@endsection