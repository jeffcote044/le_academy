<div>
    <section class="mb-4 px-4">
        <div class="container grid grid-cols-1 gap-8 md:grid-cols-{{$courses->count()}}">
            <x-stars-svg/>
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
    <x-course-preview :course="$course_data" :show="$show_preview"/>
</div>