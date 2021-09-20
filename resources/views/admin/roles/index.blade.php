@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@section('content_header')
    <h2>Lista de roles</h2>
@stop
@section('content')
    @if (session('info'))
        <div class="alert alert-primary" role="alert"> <strong>¡Muy Bien! </strong>{{session('info')}}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}">Crear role</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" >Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningun role regitrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop