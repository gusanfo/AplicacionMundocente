@extends('layout/template')

@section('content')
 <h1>Revistas</h1>
 <a href="{{url('/revistas/create')}}" class="btn btn-success">CREAR</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>Nombre</th>
         <th>Enlace</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($revistas as $revista)
         <tr>
             <td>{{ $revista->id }}</td>
             <td>{{ $revista->nombre }}</td>
             <td><a href="{{ $revista->enlace }}" target="_blank">{{ $revista->enlace }}</a></td>
             
           
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection