@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@section('content_header')<h1>Cursos por aprobar</h1>@stop
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
                        <th>Categoría</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>
                                <a href="{{route('admin.courses.show', $course)}}">Revisar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop