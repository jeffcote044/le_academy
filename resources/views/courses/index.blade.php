<x-app-layout>
    <section class="bg-primary-100 md:bg-hero-pattern bg-fixed bg-cover">
        <div class="container py-12 ">
            <div class="w-full md:w-3/4 lg:w-3/4">
                <h1 class="text-gray-900 leading-none font-black text-2xl md:text-5xl">Cursos online de Marketing Digital</h1>
                <p class="text-gray-900 my-2 md:text-xl">
                    Aprende desde cero o lleva tus habilidades al siguiente nivel en Marketing Digital, Redes Sociales y Publicidad Online.
                </p>
                @livewire('search')
            </div>
        </div>
    </section>
    <section class="pt-0 pb-16 bg-gray-50">
        @livewire('courses-index') 
    </section>
    <x-cta/>
</x-app-layout>