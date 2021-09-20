@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <h2>Editar Precio</h2>
@stop
@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div>
        <div>
            {!! Form::model( $price , ['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingreser el nombre']) !!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Valor') !!}
                {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Ingreser el valor']) !!}

                @error('value')
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