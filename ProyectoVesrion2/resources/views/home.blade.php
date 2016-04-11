@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <div class="text-center our-services">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="service-icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <div class="service-info">
                                        <a href="{{url('revistas')}}"><h3>Revistas científicas</h3></a>

                                        <p>Ahorra tiempo conociendo las revistas científicas que a la fecha reciben
                                            artículos de tu área de interés. </p>
                                    </div>
                                    <div class="alert alert-warning glyphicon glyphicon-book">
                                        <!--<strong> {{App\Http\Controllers\RevistaController::getTotal('Revistas')}}</strong>-->
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="service-icon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="service-info">
                                        <a href="{{url('convocatorias')}}"><h3>Convocatorias docentes</h3></a>
                                        <p>Entérate oportunamente sobre las oportunidades laborales del ámbito
                                            universitario y cumple con tus metas de crecimiento profesional. </p>
                                    </div>
                                    <div class="alert alert-warning glyphicon glyphicon-bullhorn">
                                        <!--<strong> {{App\Http\Controllers\RevistaController::getTotal('Convocatorias')}}</strong>-->
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="service-icon">
                                        <i class="fa fa-bullhorn"></i>
                                    </div>
                                    <div class="service-info">
                                        <a href="{{url('eventoAcademico')}}"><h3>Eventos académicos</h3></a>

                                        <p>Encuentra congresos, seminarios, conferencias y demás eventos académicos de
                                            tu interés para capacitación o presentación de tus resultados de
                                            investigación. </p>
                                    </div>
                                    <div class="alert alert-warning glyphicon glyphicon-tags">
                                        <!--<strong> {{App\Http\Controllers\RevistaController::getTotal('Eventos_academicos')}}</strong>-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection