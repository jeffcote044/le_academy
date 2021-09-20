@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <h2>Asignar un role</h2>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="h5">Nombre</h2>
            <p class="form-control">{{$user->name}}</p>
            <h2 class="h5">Listado de Roles</h2>
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => "put"]) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr1']) !!}
                            {{$role->name}}   
                        </label>
                    </div> 
                @endforeach

                {!! Form::submit('Asignar', ['class' => 'btn btn-primary mt-2']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop