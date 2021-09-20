@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <a href="{{route('admin.levels.create')}}" class="btn btn-secondary btn-sm float-right">Crear Nivel</a>
    <h2>Lista de Niveles</h2>
@stop
@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif
    <div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>
                                {{$level->id}}
                            </td>
                            <td>
                                {{$level->name}}
                            </td>
                            <td width="10px">
                                <a href="{{route('admin.levels.edit', $level)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.levels.destroy', $level)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

