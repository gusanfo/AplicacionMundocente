@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Eventos Academicos</div>
                    <div class="panel-body">

	{{-- {{App\Http\Controllers\EventoAcademicoController::getUniversity()}} --}}
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
                                    <label class="col-md-4 control-label">Ciudad</label>
                                    <div class="col-md-6">
										<input type="text" class="form-control" name="ciudad" id="ciudad">
                                    </div>
                                </div>

                              
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Areas</label>
                                    <div class="col-md-6">

                                        <select name="areas[]" class="form-control input-group-sm" id="areas"  multiple="multiple">
                                             @foreach ($areas2 as $ar)
                                                <optgroup label="{{$ar->nombre}}">
                                                    @foreach($areas as $total)
                                                        @if($total->tipo == $ar->nombre)

                                                            <option value="{{$total->nombre}}">{{$total->nombre }}</option>

                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
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
                                    <label class="col-md-4 control-label">Fecha Inicio</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_inicio"  id="fecha_inicio">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Fecha Fin</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_fin"  id="fecha_fin">
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
 
    <script type="text/javascript">
        $(document).ready(function(){
            $("#areas").select2({
                maximumSelectionLength: 3,
                placeholder: "Select un area"
            });
        });

    </script>
@endsection