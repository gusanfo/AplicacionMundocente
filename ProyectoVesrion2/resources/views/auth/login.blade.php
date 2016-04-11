@extends('app')

@section('content')

<div class="container-fluid">

  <section id="services" class="section section-padded">
    <div class="container">
      <div class="row text-center title">
        <h2>Nuestros Servicios</h2>
        <h4 class="light muted">Conocemos las actividades del día a día de un profesor universitario y somos conscientes de la importancia que para ellos tiene la realización de tareas que le permitan cumplir sus metas de crecimiento profesional.</h4>
      </div>
      <div class="row services">
        <div class="col-md-4">
          <div class="service">
            <div class="icon-holder">
              <img src="{{ asset('images/icons/guru-blue.png') }}" alt="" class="icon">
            </div>
            <h4 class="heading">Revistas científicas</h4>
            <p class="description">Ahorra tiempo conociendo las mas inmportantes revistas científicas y tecnologicas que a la fecha reciben para publicación artículos de tu área de interés.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <div class="icon-holder">
              <img src="{{ asset('images/icons/heart-blue.png') }}" alt="" class="icon">
            </div>
            <h4 class="heading">Convocatorias docentes</h4>
            <p class="description">Entérate oportunamente sobre las oportunidades laborales del ámbito universitario y cumple con tus metas de crecimiento profesional.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <div class="icon-holder">
              <img src="{{ asset('images/icons/weight-blue.png')}}" alt="" class="icon">
            </div>
            <h4 class="heading">Eventos académicos</h4>
            <p class="description">Encuentra congresos, seminarios, conferencias y demás eventos académicos de tu interés para capacitación o presentación de tus resultados de investigación.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
	<section id="team" class="section section-padded">

    <div class="row">
    <div class="col-md-12"><h4 style="text-align:center">Publicaciones de nuestros miembros</h4></div>
  </div>
  <hr>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
				 @foreach (App\Http\Controllers\ConvocatoriaController::getconvocatoria() as $convocatoria)
				 <div class="panel panel-default">
                        <div class="panel-heading" id="panel-headingConvocatoria"><em class="Panel-heading-color">Convocatoria</em></div>
                        	<div class="panel-body">
								<h4>{{ $convocatoria->universidad }}</h4>
                        		<h3>{{ $convocatoria->titulo }}</h3>
                                        <h4 class="pull-right">{{ $convocatoria->areas }}</h4>

                                        <ul class="list-unstyled">
                                            <li> {{App\Http\Controllers\RevistaController::getNombre($convocatoria->ciudad)}}
                                            </li>
                                            <li>Fecha Inicio:{{date("F j, Y", strtotime($convocatoria->fecha_inicio))}}</li>
                                            <li>Fecha Fin: {{date("F j, Y", strtotime($convocatoria->fecha_finalizacion))}}</li>
                                            <li>{{$convocatoria->descripcion}}</li>
                                            <li><a href="{{ $convocatoria->enlace }}" target="_blank"
                                                   class="btn pull-right">Mas Información</a></li>

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
                                            <li> {{App\Http\Controllers\RevistaController::getNombre($evento->ciudad)}}</li>
                                            <li>Fecha Inicio:{{date("F j, Y", strtotime($evento->fecha_evento))}}</li>
                           
                                           	<li> -</li>
                                           	<li> -</li>
                                            <li><a href="{{ $evento->enlace }}" target="_blank"
                                                   class="btn pull-right">Mas Información</a></li>

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
                                            <li> {{App\Http\Controllers\RevistaController::getNombre($revista->ciudad)}}</li>
                                            <li>Fecha Inicio:{{date("F j, Y", strtotime($revista->fechaRecepcion))}}</li>
                           
                                           	<li>Tipo De Revista: {{ $revista->tipoRevista}}</li>
                                           	<li>Categoria: {{$revista->categoria}} </li>
                                            <li><a href="{{ $evento->enlace }}" target="_blank"
                                                   class="btn pull-right">Mas Información</a></li>

                                        </ul>
                                    </div>
                                </div>
                  @endforeach




                  

		</div>
	</div>
  </section>	


  


	<div class="row"><hr width="90%"></div>
	<br>
	<div class="row">
		<div class="col-md-3" style="text-align:center">
			<div class="row"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
			<div class="row">{{App\Http\Controllers\RevistaController::getusers('Usuarios')}}</div>
			<div class="row">Docentes</div>
		</div>
		<div class="col-md-3" style="text-align:center">
			<div class="row"> <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span></div>
			<div class="row">{{App\Http\Controllers\RevistaController::getTotal('Convocatorias')}}</div>
			<div class="row">Convocatorias</div>
		</div>
		<div class="col-md-3" style="text-align:center">
			<div class="row"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span></div>
			<div class="row"><strong> {{App\Http\Controllers\RevistaController::getTotal('Eventos_academicos')}}</strong></div>
			<div class="row">Eventos Academicos</div>
		</div>
		<div class="col-md-3" style="text-align:center">
			<div class="row"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></div>
			<div class="row">{{App\Http\Controllers\RevistaController::getTotal('Revistas')}}</div>
			<div class="row">Revistas</div>
		</div>
	</div>
</div>
<br>
<br>

<footer>
    
    <div class="footer-bottom">
        <div class="container-fluid">
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
