<x-app-layout>
    <section class="bg-primary-100 md:bg-hero-pattern bg-fixed bg-cover">
        <div class="container py-12 ">
            <div class="w-full md:w-3/4 lg:w-3/4">
                <h1 class="text-gray-900 leading-none font-black text-2xl md:text-5xl text-center md:text-left">Blog de Marketing Digital</h1>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-24 bg-gray-50">
        <div class="container">
            <div class="grid grid-cols-1 gap-x-4 grid-rows-1 md:grid-cols-3 md:gap-x-8">

                <a href="#" class="block mb-6 md:col-span-3 md:mb-10">
                    <div class="flex flex-col md:flex-row overflow-hidden rounded-xl bg-white shadow-xs h-full">
                        <figure class="flex-1 h-96">
                            <img src="{{asset('img/blog/heros/appletvplus_hero.jpg')}}" alt="" class=" object-cover w-full my-auto">
                        </figure>
                        <div class="px-6 py-8  flex flex-col md:w-2/6 ">
                            <span class="uppercase text-xs font-medium text-gray-500">Marketing</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5 md:text-3xl md:leading-normal">Apple amplía las herramientas gratuitas para profesores</h2>
                            <small class="text-gray-500">Febrero 16, 2021</small>
                        </div>
                    </div>
                </a>

                <a href="#" class="block mb-6">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-white shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/appletvplus_hero.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Marketing</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">Apple consigue sus primeras nominaciones a los Óscar</h2>
                            <small class="text-gray-500">Febrero 16, 2021</small>
                        </div>
                    </div>
                </a>
                <a href="#" class="block mb-6">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-white shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/appletvplus_hero.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Marketing</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">Apple consigue sus primeras nominaciones a los Óscar</h2>
                            <small class="text-gray-500">Febrero 16, 2021</small>
                        </div>
                    </div>
                </a>
                <a href="#" class="block mb-6">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-white shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/appletvplus_hero.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Marketing</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">Apple consigue sus primeras </h2>
                            <small class="text-gray-500">Febrero 16, 2021</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>