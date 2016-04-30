@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ Session::get('flash_message')  }}
                    </div>

                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Revistas</div>
                    <div class="panel-body">

			<div id="fb-root"></div>
			<script>(function(d, s, id) {
  			var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6";
  			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>



                        @if( App\Http\Controllers\RevistaController::getType() == 'Publicar')
                        <a href="{{url('/revistas/create')}}" class="btn btn-success">CREAR</a>
                       @else
                           <a style="display: none" href="{{url('/revistas/create')}}" class="btn btn-success">CREAR</a>
                        @endif
                        
                        {!! Form::open(['route' => 'revistas.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right','role'=>'search']) !!}

                        <div class="form-group">
                            {!! Form::text('type',null,['class'=>'form-control', 'placeholder'=>'search'])  !!}
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        {!!Form::close()!!}
                        <hr>
                        <br>
                        @if($revistas->count())
                        @foreach ($revistas as $revista)
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $revista->universidad }}</div>
				<h4  class="pull-right"><div class="fb-share-button" data-href="http://grupo5.virtualtic.co/revistas" data-layout="button_count" data-mobile-					iframe="true"></div></h4>
				
                                <div class="panel-body">

                                    <h2>{{ $revista->titulo }}</h2>
                                    <h4  class="pull-right">{{ $revista->areas }}</h4>
                                    <ul class="list-unstyled">
                                        <li> {{App\Http\Controllers\RevistaController::getNombre($revista->ciudad)}}
                                        </li>
                                        <li>{{ $revista->tipoRevista }} {{ "  " }} {{ $revista->categoria}} </li>
                                        <li>@if($revista->fechaRecepcion == '0000-00-00')
                                                {{'Permanente'}}
                                            @else
                                                {{date("F j, Y", strtotime($revista->fechaRecepcion ))}}
                                           @endif
                                        </li>
                                        <li><a href="{{ $revista->enlace }}" target="_blank"
                                               class="btn pull-right">Mas Informacion</a>
                                        </li>
                                    </ul>
				    
                                </div>
                            </div>

                        @endforeach
                        @else
                            <p> No se han encontrado Resultados </p>
                        @endif
                       {!! $revistas->appends(Request::only(['type']))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('div.alert').delay(3000).slideUp(300);

        });

    </script>

@endsection