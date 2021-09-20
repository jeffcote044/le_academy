<x-instructor.course-layout :course="$course">
    
    <h2 class="text-2xl font-bold">Información del curso</h2>
    <hr class="mt-2 mb-6"/>
    
    <div class="color-gray-500">
        {!!$course->observation->body!!}
    </div>

</x-instructor.course-layout>