@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')

@section('content_header')
    <a href="{{route('admin.prices.create')}}" class="btn btn-secondary btn-sm float-right">Crear Precio</a>
    <h2>Lista de Precios</h2>
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
                    @foreach ($prices as $price)
                        <tr>
                            <td>
                                {{$price->id}}
                            </td>
                            <td>
                                {{$price->name}}
                            </td>
                            <td width="10px">
                                <a href="{{route('admin.prices.edit', $price)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy', $price)}}" method="POST">
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

