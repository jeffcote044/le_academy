@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <h2>Crear nuevo nivel</h2>
@stop
@section('content')
    <div>
        <div>
            {!! Form::open(['route' => 'admin.levels.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingreser el nombre']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop