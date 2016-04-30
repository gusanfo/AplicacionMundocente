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

                                    </div>
                                                                        
                                </div>
                                <div class="col-sm-4">
                                    <div class="service-icon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="service-info">
                                        <a href="{{url('convocatorias')}}"><h3>Convocatorias docentes</h3></a>
                                       
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="service-icon">
                                        <i class="fa fa-bullhorn"></i>
                                    </div>
                                    <div class="service-info">
                                        <a href="{{url('eventoAcademico')}}"><h3>Eventos académicos</h3></a>

                                       
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