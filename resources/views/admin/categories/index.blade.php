@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <a href="{{route('admin.categories.create')}}" class="btn btn-secondary btn-sm float-right">Crear categoria</a>
    <h2>Lista de Categorias</h2>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{$category->name}}
                            </td>
                            <td width="10px">
                                <a href="{{route('admin.categories.edit', $category)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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

