@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <strong> Usuarios: </strong>{{$users->count()}} <br>
                        <hr>
                    @if($users->count())
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    <button type="submit" class="btn btn-success"> <a href="#"  style='text-decoration:none'>Activar</a></button>
                                    <button type="submit" class="btn btn-danger"> <a href="#" style='text-decoration:none'>Eliminar</a></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p> No se han encontrado Resultados </p>
                    @endif
                    {!!$users->render()!!}

                </div>
            </div>
        </div>
    </div>
@endsection