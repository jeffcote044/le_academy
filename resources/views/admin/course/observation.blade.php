@extends('adminlte::page')
@section('title', 'Keto Bayter Academy')
@section('content_header')<h1>Observaciones del curso <strong> {{$course->title}}</strong></h1>@stop
@section('content')
    <div class="bg-gray-500 py-12 mb-12">
        <div class="bg-white shadow px-4 py-4 mb-6">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
            <div class="form-group ">
                {!! Form::label('body', 'Observaciones del curso') !!}
                {!! Form::textarea('body', null) !!}
                @error('body')
                    <strong class="text-danger text-sm">{{$message}}</strong>
                @enderror
            </div>
            {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop