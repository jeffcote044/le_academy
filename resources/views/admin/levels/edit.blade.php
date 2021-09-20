@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <h2>Editar Nivel</h2>
@stop
@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div>
        <div>
            {!! Form::model( $level , ['route' => ['admin.levels.update', $level], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingreser el nombre']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop