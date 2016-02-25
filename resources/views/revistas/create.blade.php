@extends('layout.template')
@section('content')
    <h1>REVISTAS</h1>
    {!! Form::open(['url' => 'revistas']) !!}
    
    <div class="form-group">
        {!! Form::label('Nombre', 'Nombre:') !!}
        {!! Form::text('nombre',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Enlace', 'Enlace:') !!}
        {!! Form::text('enlace',null,['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop