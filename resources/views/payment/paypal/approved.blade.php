<x-app-layout :course="$course">
  <div class="max-w-7xl mx-auto px-8 relative" style="height : calc(100vh - 4.1rem);">
    <div class="absolute left-6/12 top-6/12 transform -translate-x-6/12 -translate-y-6/12 w-full">
      <div class="mx-auto max-w-4xl shadow-lg rounded-md overflow-hidden flex">
        <div class="bg-green-500 px-12 text-white max-w-sm flex-col flex justify-center items-center py-8">
          <div>
            <div class="text-white">
              <svg class="w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
            </div>
            <p class="text-xl mt-2 mb-4">Hola {{auth()->user()->name}},</p>
            <h3 class="text-4xl leading-10 font-extrabold">Muchas gracias por tu compra.</h3>
            <p class="mt-4">Enviaremos a tu correo electrónico <b>{{auth()->user()->email}}</b> tu factura con los detalles de compra.</p>
          </div>
        </div>
        <div class="bg-gray-50 p-12 text-gray-700 w-full flex-col flex justify-center items-center">
            <div>
              <div class="flex mb-8">
                <img class="h-24 object-cover" src="{{Storage::url($course->image->url)}}">
                <div class="ml-4">
                  <p class="text-base font-bold">{{$course->title}} </p>
                  <p class="text-sm text-gray-400">{{$course->subtitle}} </p>
                </div>
              </div>
              <hr class="my-8">
              <div>
                @can('enrolled', $course)
                  <a class="block text-center w-full bg-green-500 hover:bg-green-600 text-white font-bold p-4 rounded" href="{{route('courses.status', $course )}}">
                    Empieza a aprender
                  </a>
                @else
                  <p><b>Tu pago está en proceso de verificación</b>, en las próximas horas tendrás acceso al contenido del curso. Revisa la página de <a href="#" class="font-bold underline">tus cursos</a> en las próximas horas.</p>
                @endcan
              </div>
            </div>
        </div>
      </div>
      <div 
        x-data="{$open : false}"
        x-show="$open">
        <div class="fixed bottom-4 left-6/12 transform -translate-x-6/12 flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6">
          <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
            <div class="text-green-500">
              <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="text-green-500 text-sm font-medium ml-3">Pago con éxito.</div>
          </div>
          <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Su pago se ha procesado exitosamente.</div>
          <div x-on:click="$open = !$open" class="ml-4 absolute sm:relative sm:top-auto sm:right-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          </div>
        </div>
      </div>
      <div class="mt-12">
          <h3 class="text-lg text-gray-700 text-center font-bold mb-4">Cuéntale a tus amigos que estás invirtiendo en ti</h3>
          <div class="flex items-center justify-center">
              <a class=" inline-block mr-4" href="https://www.facebook.com/sharer/sharer.php?u={{route('courses.show', $course )}}" target="_blank" title="Compartir en Facebook">
                  <i class="text-4xl fab fa-facebook-square text-blue-700"></i>
                  <span class="text-gray-dark hidden">Facebook</span>
              </a>
              <a class=" inline-block mr-4" href="https://twitter.com/share?url={{route('courses.show', $course )}}/&amp;amp;text=&amp;amp;via=mediasocialco" target="_blank" title="Compartir en Twitter">
                  <i class="text-4xl fab fa-twitter-square text-blue-400 "></i>
                  <span class="text-gray-dark hidden">Twitter</span>
              </a>
              <a class=" inline-block mr-4" href="https://www.linkedin.com/shareArticle?mini=true&url={{route('courses.show', $course )}}/&title=&summary=&source=" target="_blank" title="Compartir en Linkedin">
                  <i class="text-4xl fab fa-linkedin text-blue-500"></i>
                  <span class="text-gray-dark hidden">Linkedin</span>
              </a>
              <div class="inline-block relative" x-data="{ input: '{{route('courses.show', $course )}}' }">
                  <button type="button" x-on:click="$clipboard(input)" title="Copiar enlace">
                      <i class="text-4xl fas fa-link text-gray-400"></i>
                      <span class="text-gray-dark hidden">Copiar enlace</span>
                  </button>
              </div>
          </div>
      </div>
    </div>
  </div>
<x-slot name="js"></x-slot>
</x-app-layout>