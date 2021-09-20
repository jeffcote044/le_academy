<x-app-layout>
    <div class="container md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-4 mt-8 md:min-h-screen">
        <div class="md:col-span-5">
            <div class="flex items-center flex-wrap md:flex-no-wrap">
                <h2 class="text-gray-700 text-3xl font-bold w-full md:w-auto">Total a pagar:</h2>
                <div class="md:ml-4">
                    @if ($course->discount)
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$course->finalPrice}} US$</p>
                            <span class=" text-base ml-2 line-through text-gray-500">{{$course->price->name}}</span>
                        </div>
                    @else
                        <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$course->price->name}}</p>
                    @endif
                </div>
            </div>
            <div class="mt-4 md:mt-6">
                <h3 class="text-base font-bold mb-2 md:mb-4 text-gray-800">Método de pago</h3>
                <ul class=" mb-4 flex w-full items-center justify-between sm:justify-start">
                    
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/visa_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/mastercard_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/americanexpress_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/discover_logo.png')}}" alt="">
                    </li>
                   
                </ul>
                <div class=" mt-4 md:mt-6">
                        @livewire('course-pay', ['course' => $course])
                
                    <div class="mt-8 flex items-center cursor-default">
                        <div class="bg-gray-100 border border-gray-200 rounded-full p-3 mr-3">
                            <i class="fas fa-shield-alt text-3xl text-secundary-400"></i>
                        </div>
                        <p class="text-secundary-400 font-extrabold leading-4" >Pago 100% seguro<br/><span class="text-sm text-secundary-400 font-normal">protegemos tus datos.</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-4 my-6 md:my-0">
            <div class="bg-white md:shadow md:px-8 py-4">
                <article class="flex flex-wrap md:flex-no-wrap items-start text-gray-600">
                    <img class="md:h-28 md:w-auto w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                    <div class="ml-4 mt-4 md:mt-0">
                        <h2 class="text-lg font-bold">{{$course->title}}</h2>
                        <p class="text-sm text-gray-400">Por: {{$course->teacher->name}} </p>
                    </div>
                </article>
                <hr class="my-8">
                <div class="flex items-center">
                    <img src="{{asset('/img/checkout/garantia.png')}}" alt="">
                    <p class="text-xs ml-4">Si tu experiencia con la compra no es lo que esperabas, te haremos un reembolso del 100% de tu pago. Por favor revisar nuestras <a href="#" class="text-accent-400 font-bold underline ">Políticas de Reembolso</a></p>
                </div>
                <p class="text-xs my-4">Los precios base que manejamos son en dólares americanos.</p>
                <p class="text-xs">(1) Acepto expresamente todos los Términos y Condiciones de Membresías. Del mismo, modo acepto las Políticas y Avisos de Protección y Tratamiento de Datos Personales de {{env('BUSINESS_NAME')}}</p>
            </div>
        </div>
    </div>

</x-app-layout>