@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@section('content_header')
    <h2>Lista de roles</h2>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                @include('admin.roles.partials.form')             
                {!! Form::submit('Listo', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop