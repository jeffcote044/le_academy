@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@section('content_header')
    <h2>Editar Role</h2>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                @include('admin.roles.partials.form') 
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop