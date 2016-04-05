@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Revistas</div>
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
                            <form name="formR" class="form-horizontal" role="form" method="POST"
                                  action="{{ url('/revistas') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Departamento</label>
                                    <div class="col-md-6">

                                        <select name="departamento" class="form-control input-group-sm"
                                                id="departamento">
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{$departamento->id}}"
                                                        selected="selected">{{$departamento->nombre }}</option>

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
                                        <select name="universidad" class="form-control input-group-sm" id="universidad">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Areas</label>
                                    <div class="col-md-6">

                                        <select name="areas[]" class="form-control input-group-sm"
                                                id="areas" multiple="multiple">
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
                                    <label class="col-md-4 control-label">Tipo Revista</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                         <span class="input-group-addon">
                                            <input type="radio" name="tipoRevista" value="Indexada" checked
                                                   id="tipoRevista">Indexada
                                          </span>

                                             <span class="input-group-addon">
                                            <input type="radio" name="tipoRevista" value="No Indexada" id="tipoRevista">No Indexada
                                          </span>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Categoria</label>
                                    <div class="col-md-6">
                                        <select name="categoria" class="form-control input-group-sm" id="categoria">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha Recepcion</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fechaRecepcion"
                                               id="fechaRecepcion">

                                        <!--  <input type="checkbox" name="fechaRecepcion"  value="fechaRecepcion" id="fechaRecepcion">Permanente-->

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
            $("#areas").select2({
                maximumSelectionLength: 2
            });
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