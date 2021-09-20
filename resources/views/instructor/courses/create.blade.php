<x-instructor.index-layout>
    <div class=" mx-auto mt-4 rounded-sm shadow ">
        <div class="bg-white">
            <div class="py-6 px-4">
                <h2 class="text-2xl mb-6">Crear nuevo curso</h2>
                <hr class="mt-2 mb-6">
                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true]) !!}
                {!! Form::hidden('user_id', Auth::user()->id) !!}
                    @include('instructor.courses.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Crear', ['class' => 'cursor-pointer inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-700 rounded shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>
</x-instructor.index-layout>