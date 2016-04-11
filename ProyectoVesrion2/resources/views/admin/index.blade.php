@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <div class="panel-body">

                         <hr>

                        @if($user->count())
                        @foreach ($users as $user)
                            <div class="panel panel-default">
                                <div class="panel-heading">Usuarios</div>
                                <div class="panel-body">

                                </div>
                            </div>

                        @endforeach
                        @else
                            <p> No se han encontrado Resultados </p>
                        @endif
                        {!!$users->render()!!}
                    </div>
                </div>
            </div>
        </div>
      
    </div>

@endsection