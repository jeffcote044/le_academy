<x-instructor.course-layout :course="$course">
    
    <h2 class="text-2xl font-bold">Información del curso</h2>
    
    <hr class="mt-2 mb-6"/>
    {!! Form::model($course, ['route'=> ['instructor.courses.update', $course], 'method' => 'put', 'files'=>true]) !!}
    @include('instructor.courses.partials.form')
    
    <div class="flex justify-end">
        {!! Form::submit('Actualizar información', ['class' => 'cursor-pointer inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none']) !!}
    </div>
    {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>
</x-instructor.course-layout>