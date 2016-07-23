@extends('app')

@section('content')

        <br>
        <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2>Bienvenido {{ Auth::user()->name }}, desde ya formas parte de la comunidad Mundocente</h2>
                <p>Conocemos las actividades del día a día de un profesor universitario y somos conscientes de la importancia que para ellos tiene la realización de tareas que le permitan cumplir sus metas de crecimiento profesional.</p>
                <p>En Mundocente ofrecemos la información que necesita un docente universitario para tener las mejores oportunidades de crecimiento laboral y personal de acuerdo con sus intereses profesionales.</p>
            </div>
            <div class="col-sm-4">
                <h2>Contacto</h2>
                <address>
               
                    <br>Tunja, Boyacá
                    <br>Avenida Central del Norte 39-115 
                    <br>
                </address>
                <address>
                    <abbr title="Phone">Tel: (57+8) 7428263 
                    <br>
                    <abbr title="Email">www.mundocente.co/</a>
            <br>
            <abbr title="facebook"><div class="fb-like" data-href="https://www.facebook.com/mundocente/?fref=ts" data-width="60" data-layout="box_count" data-action="recommend" data-show-faces="true" data-share="true"></div></a>
                </address>
            </div>
		    
            
        </div>
        
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <a href="{{url('revistas')}}"><img class="img-circle img-responsive img-center" src="{{ asset('images/revistas.jpg') }}" alt="">
                <h3>Revistas científicas</h3></a>
                <p>Ahorra tiempo conociendo las revistas científicas que a la fecha reciben
                   artículos de tu área de interés. Desde ahora tambien puedes publicar una revista para que los demas docentes se mantengan informados y apliquen a la recepcion de articulos</p>

            </div>
            <div class="col-sm-4">
               <a href="{{url('convocatorias')}}"> <img class="img-circle img-responsive img-center" src="{{ asset('images/convocatorias.jpg') }}" alt="">
                 <h3>Convocatorias docentes</h3></a>
                <p> Entérate oportunamente sobre las oportunidades laborales del ámbito
                                            universitario y cumple con tus metas de crecimiento profesional. Informa a los demás docentes de las convocatorias de tu universidadad</p>
            </div>
            <div class="col-sm-4">
                <a href="{{url('eventoAcademico')}}"><img class="img-circle img-responsive img-center" src="{{ asset('images/eventos.jpg') }}" alt="">
                <h3>Eventos académicos</h3></a>
                <p>Encuentra y publica congresos, seminarios, conferencias y demás eventos académicos de
                                            tu interés para capacitación o presentación de tus resultados de
                                            investigación.</p>
            </div>
        </div>
        <hr>
        <footer>
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; Mundocente 2016</p>
                </div>
            </div>
        </footer>

    
	<div id="fb-root"></div>
    </div>
    @endsection


@section('scripts')
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


 

        
@endsection