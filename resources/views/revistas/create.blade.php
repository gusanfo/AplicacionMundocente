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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/revistas') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">University</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="universidad">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Limit Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="fecha_limite">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Link</label>
                                    <div class="col-md-6">
                                        <input type="url" class="form-control" name="enlace">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
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