@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Convocatorias</div>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/convocatorias') }}">
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

                                        <select  name="ciudad" class="form-control input-group-sm" placeholder="Selecciona" id="ciudad">
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Universidad</label>
                                    <div class="col-md-6">
                                        <select  name="universidad" class="form-control input-group-sm" id="universidad">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Areas</label>
                                    <div class="col-md-6">
                                        <!--  multiple="multiple" onchange="changeselectItems(this);"-->
                                        <select name="areas" class="form-control input-group-sm"
                                                id="areas">
                                            @foreach ($areas as $area)
                                                <option value="{{$area->nombre }}">{{$area->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label">Titulo</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="titulo">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha Inicio</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_inicio">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha Finalizacion</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_finalizacion">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Descripcion</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="descripcion" rows="4" cols="40"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Enlace</label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" name="enlace">
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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#areas").select2();
            $("#departamento").select2({
                placeholder: "Select a departament"
            });
            $("#ciudad").select2({
                placeholder: "Select a city"
            });
            $("#universidad").select2({
                placeholder: "Select a university"
            });
        });

    </script>
@endsection


