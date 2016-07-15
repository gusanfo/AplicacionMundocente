@extends('app')

@section('content')



<div class="container-fluid">  
	<section id="team" class="section gray-bg">
    <div class="container">
    <div class="row">

    <div class="col-md-12"><h4 class="light muted" style="text-align:center">Publicaciones de nuestros miembros</h4></div>
  </div>
  <hr>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
				 @foreach (App\Http\Controllers\ConvocatoriaController::getconvocatoria() as $convocatoria)
				 <div class="panel panel-default">
                        <div class="panel-heading" id="panel-headingConvocatoria"><em class="Panel-heading-color">Convocatoria</em></div>
                        	<div class="panel-body">
								            <h4><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp {{ $convocatoria->universidad }}</h4>
                        		<h3>{{ $convocatoria->titulo }}</h3>
                                        <h4 class="pull-right"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp {{ $convocatoria->areas }}</h4>

                                        <ul class="list-unstyled">
                                            <li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> {{$convocatoria->ciudad}}
                                            </li>
                                            <li><span class=" glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp Fecha Inicio:{{date("F j, Y", strtotime($convocatoria->fecha_inicio))}}</li>
                                            <li><span class=" glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp Fecha Fin: {{date("F j, Y", strtotime($convocatoria->fecha_finalizacion))}}</li>
                                            <li><span class="   glyphicon glyphicon-align-left" aria-hidden="true"></span> &nbsp {{$convocatoria->descripcion}}</li>
                                            <li><a href="{{ $convocatoria->enlace }}" target="_blank"
                                                   class="btn pull-right" id="btnfirst">Mas Información</a></li>

                                        </ul>
                                    </div>
                                </div>
                  @endforeach

                   @foreach (App\Http\Controllers\EventoAcademicoController::getevento() as $evento)
				 <div class="panel panel-default">
                        <div class="panel-heading" id="panel-headingEvento"><em class="Panel-heading-color">Evento Academico</em></div>
                        	<div class="panel-body">
								<h4>{{ $evento->universidad }}</h4>
                        		<h3>{{ $evento->titulo }}</h3>
                                        <h4 class="pull-right">{{ $evento->areas }}</h4>

                                        <ul class="list-unstyled">
                                            <li> {{$evento->ciudad}}</li>
                                            <li>Fecha Inicio:{{date("F j, Y", strtotime($evento->fecha_inicio))}}</li>
                                            <li>Fecha Final:{{date("F j, Y", strtotime($evento->fecha_fin))}}</li>
                                           
                                            <li><a href="{{ $evento->enlace }}" target="_blank"
                                                   class="btn pull-right" id="btnsecond">Mas Información</a></li>

                                        </ul>
                                    </div>
                                </div>
                  @endforeach


                     @foreach ($revistas as $revista)
				 <div class="panel panel-default">
                        <div class="panel-heading" id="panel-headingEvento"><em class="Panel-heading-color">Revistas</em></div>
                        	<div class="panel-body">
								<h4>{{ $revista->universidad }}</h4>
                        		<h3>{{ $revista->titulo }}</h3>
                                        <h4 class="pull-right">{{ $revista->areas }}</h4>

                                        <ul class="list-unstyled">
                                           
                                            <li>@if($revista->fechaRecepcion == '0000-00-00')
                                                {{'Permanente'}}
                                            @else
                                                {{date("F j, Y", strtotime($revista->fechaRecepcion ))}}
                                           @endif
                                        </li>
                           
                                           	<li>{{ $revista->tipoRevista}} 
											 	{{$revista->categoria}}
                                           	</li>
                                           	 
                                            <li><a href="{{ $revista->enlace }}" target="_blank"
                                                   class="btn pull-right">Mas Información</a></li>

                                        </ul>
                                    </div>
                                </div>
                  @endforeach       

		</div>
	</div>
  </div>
  </section>	


  


	<div class="row"><hr width="90%"></div>
	
	<div class="row">
		
	</div>
</div>



<section class="dark-bg short-section stats-bar">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-3 mb-sm-30">
            <div class="counter-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <h2 class="stat-number" data-n="12">{{App\Http\Controllers\RevistaController::getusers('users')}}</h2>
              <h6>Docentes</h6>
            </div>
          </div>
          <div class="col-md-3 mb-sm-30">
            <div class="counter-item">
              <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
              <h2 class="stat-number" data-n="167">{{App\Http\Controllers\RevistaController::getTotal('convocatorias')}}</h2>
              <h6>Convocatorias</h6>
            </div>
          </div>
          <div class="col-md-3 mb-sm-30">
            <div class="counter-item">
              <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              <h2 class="stat-number" data-n="6">{{App\Http\Controllers\RevistaController::getTotal('eventos_academicos')}}</h2>
              <h6>Eventos Academicos</h6>
            </div>
          </div>
          <div class="col-md-3 mb-sm-30">
            <div class="counter-item">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              <h2 class="stat-number" data-n="34">{{App\Http\Controllers\RevistaController::getTotal('revistas')}}</h2>
              <h6>Revistas</h6>
            </div>
          </div>
        </div>
      </div>
    </section>

  <p id="back-top">
      <a href="#top"><i class="fa fa-angle-up"></i></a>
  </p>

<footer>
    
    <div class="footer-bottom">
   
        <div class="container-fluid">
         @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('flash_message')  }}
                    </div>

                @endif
            <p class="pull-left" id="pie"> Copyright © Mundocente 2016. Todos Los Derechos Reservados. </p>
            <div class="pull-right">
                <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube">  </i> </a> </li>
                    </ul>
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

@endsection
