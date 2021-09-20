<x-app-layout>
    <section class="bg-fixed bg-cover min-h-screen" style="background-image: url({{asset('img/backgrounds/ea857aff-1a05-4f66.jpg')}})">

        <div class="py-6 md:py-12 max-w-4xl mx-auto">
            <div class="">
                <header class="leading-tight text-center">
                    <p class="text-sm md:text-xl inline bg-accent-400 px-1 md:px-4 text-gray-50">Muchas gracias por inscribirte al masterclass online</p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">Alimentación Complementaria</h1>
                    <h2 class="text-base md:text-2xl">Método tradicional / BLW / BLISS</h2>
                </header>
                <p class="my-4 text-center text-sm md:text-base">En los próximos minutos llegará al correo electrónico que registraste anteriormente toda la información para que puedas acceder al <b>masterclass</b> de alimentación complementaria. </p>
                <figure>
                    <img src="{{asset('img/billboards/banner_masterclass_thanks.jpg')}}" alt="">
                </figure>
                <div class="my-4 text-center">
                    <p class="text-sm md:text-base">Si quieres acceder ya al <b>masterclass</b> de alimentación complementaria puedes hacerlo dando click en el siguiente botón: </p>
                    <div class="my-2 px-1"><a href="{{route('masterclass.replay', compact('course'))}}" class="bg-accent-400 rounded-lg font-bold text-white text-center inline-block md:px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-100  text-lg w-full" >¡Si quiero ver es masterclass ya!</a></div>
                    <div class="leading-none">
                        <small class="text-xs">* Recuerda que este masterclass estará disponible por poco tiempo</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('footerText')
        <div class="leading-none">
            <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
        </div>
    @endpush
</x-app-layout>
