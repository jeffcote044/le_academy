<x-app-layout :course="$course">
  <div class="max-w-7xl mx-auto px-8 relative" style="height : calc(100vh - 4.1rem);">
    @switch($pay_data['transactionState'])
      @case(4)  
        <div class="absolute left-6/12 top-6/12 transform -translate-x-6/12 -translate-y-6/12 w-full">
          <div class="mx-auto max-w-4xl shadow-lg rounded-md overflow-hidden flex">
            <div class="bg-green-500 px-12 text-white max-w-sm flex-col flex justify-center items-center">
              <div>
                <div class="text-white">
                  <svg class="w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="text-xl mt-2 mb-4">Hola {{auth()->user()->name}},</p>
                <h3 class="text-4xl leading-10 font-extrabold">Muchas gracias por tu compra.</h3>
                <p class="mt-4">Enviaremos a tu correo electrónico <b>{{auth()->user()->email}}</b> tu factura con los detalles de compra.</p>
                <p class="mt-6">Número de orden <b>#{{$pay_data['reference_pol']}}</b></p>
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
                  <div class="mb-4 text-gray-500">
                    <p class="mb-4 text-sm text-gray-500 font-bold">Detalles de tu compra:</p>
                    <p class="text-xl"><b class="text-base text-gray-700">Fecha de compra:</b> <br> {{\Carbon\Carbon::parse($pay_data['processingDate'])->isoFormat('MMMM D YYYY')}} </p>
                    <p class="text-xl mt-2"><b class="text-base text-gray-700">Pago final:</b> <br> {{$pay_data['TX_VALUE']}} ${{$pay_data['currency']}} </p>
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
      @break
      @case(6)
        <div class="absolute left-6/12 top-6/12 transform -translate-x-6/12 -translate-y-6/12 w-full">
          <div class="mx-auto max-w-4xl shadow-lg rounded-md overflow-hidden flex">
            <div class="bg-red-500 px-12 text-white max-w-sm flex-col flex justify-center items-center">
              <div>
                <div class="text-white">
                  <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <h3 class="text-4xl mt-2 leading-10 font-extrabold">Opps! ha ocurrido un error.</h3>
                <p class="text-xl mt-4 mb-4">Hola {{auth()->user()->name}},</p>
                <p class="mt-4">Hubo un problema con tu método de pago y el sistema no puedo efectuar el pago.</p>
                <p class="mt-6">Número de orden <b>#{{$pay_data['reference_pol']}}</b></p>
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
                  <div class="mb-4 text-gray-500">
                    <p class="mb-4 text-sm text-gray-500 font-bold">Detalle de transacción:</p>
                    <p class="text-xl"><b class="text-base text-gray-700">Respuesta de la entidad:</b> <br>
                    
                      @switch($pay_data['lapResponseCode'])
                          @case("PAYMENT_NETWORK_REJECTED")
                              Transacción rechazada por entidad financiera
                            @break
                          @case("ENTITY_DECLINED")
                              Transacción rechazada por el banco
                            @break
                          @case("INSUFFICIENT_FUNDS")
                              Fondos insuficientes
                            @break
                          @case("INVALID_CARD")
                              Tarjeta inválida
                            @break 
                          @case("CONTACT_THE_ENTITY")
                            Contactar entidad financiera
                            @break
                          @case("BANK_ACCOUNT_ACTIVATION_ERROR")
                            Débito automático no permitido
                            @break
                          @case("BANK_ACCOUNT_NOT_AUTHORIZED_FOR_AUTOMATIC_DEBIT")
                            Débito automático no permitido
                            @break
                          @case("INVALID_AGENCY_BANK_ACCOUNT")
                            Débito automático no permitido
                            @break
                          @case("INVALID_BANK_ACCOUNT")
                            Débito automático no permitido
                            @break 
                          @case("INVALID_BANK")
                            Débito automático no permitido
                            @break 
                          @case("EXPIRED_CARD")
                            Tarjeta vencida
                            @break 
                          @case("RESTRICTED_CARD")
                            Tarjeta restringida
                            @break 
                          @case("INVALID_EXPIRATION_DATE_OR_SECURITY_CODE")
                            Fecha de expiración o código de seguridadinválidos
                            @break
                          @case("REPEAT_TRANSACTION")
                            Reintentar pago
                            @break 
                          @case("INVALID_TRANSACTION")
                            Transacción inválida
                            @break 
                          @case("EXCEEDED_AMOUNT")
                            El valor excede el máximo permitido por la entidad
                            @break
                          @case("ABANDONED_TRANSACTION")
                            Transacción abandonada por el pagador
                            @break
                          @case("CREDIT_CARD_NOT_AUTHORIZED_FOR_INTERNET_TRANSACTIONS")
                            Tarjeta no autorizada para comprar por internet
                            @break
                          @case("ANTIFRAUD_REJECTED")
                            Transacción rechazada por sospecha de fraude
                            @break 
                          @case("BANK_FRAUD_REJECTED")
                            Transacción rechazada debido a sospecha de fraude en la entidad financiera
                            @break 
                          @case("DIGITAL_CERTIFICATE_NOT_FOUND")
                            Certificado digital no encotnrado
                            @break 
                          @case("BANK_UNREACHABLE")
                            Error tratando de cominicarse con el banco
                            @break 
                          @case("ENTITY_MESSAGING_ERROR")
                            Error comunicándose con la entidad financiera
                            @break 
                          @case("NOT_ACCEPTED_TRANSACTION")
                            Transacción no permitida al tarjetahabiente
                            @break 
                          @case("INTERNAL_PAYMENT_PROVIDER_ERROR")
                            Error
                            @break 
                          @case("INACTIVE_PAYMENT_PROVIDER")
                            Error
                            @break 
                          @default
                              Rechazo desconocido
                      @endswitch
                      
                    </p>
                    <p class="text-xl mt-2"><b class="text-base text-gray-700">Estado:</b> <br> {{$pay_data['lapTransactionState']}}</p>
                  </div>
                  
                  <hr class="my-8">
                  <div>
                    <a class="block text-center w-full bg-red-500 hover:bg-red-600 text-white font-bold p-4 rounded" href="{{route('payment.checkout', $course )}}">
                      Intenta con otro método de pago
                    </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="mt-12">
              <h3 class="text-lg text-gray-700 text-center font-bold mb-4">Comparte este curso con tus amigos</h3>
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
      @break
      @case(7)
        <div class="absolute left-6/12 top-6/12 transform -translate-x-6/12 -translate-y-6/12 w-full">
          <div class="mx-auto max-w-4xl shadow-lg rounded-md overflow-hidden flex">
            <div class="bg-primary-400 px-12 text-gray-900 max-w-sm flex-col flex justify-center items-center">
              <div>
                <div class="text-accent-400">
                  <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                </div>
                <h3 class="text-4xl mt-2 leading-none font-extrabold">Acción adicional requerida.</h3>
                <p class="text-xl mt-4 mb-4">Hola {{auth()->user()->name}},</p>
                <p class="mt-4">El cobro de tu compra no se pudo hacer en este momento. Te escribiremos al correo <b>{{auth()->user()->email}}</b> cuando se valide el pago.</p>
                <p class="mt-6">Número de orden <b>#{{$pay_data['reference_pol']}}</b></p>
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
                  <div class="mb-4 text-gray-500">
                    <p class="mb-4 text-sm text-gray-500 font-bold">Detalle de transacción:</p>
                    <p class="text-xl"><b class="text-base text-gray-700">Respuesta de la entidad:</b> <br>
                      @switch($pay_data['lapResponseCode'])
                        @case("PAYMENT_NETWORK_REJECTED")
                            Transacción rechazada por entidad financiera
                          @break
                        @case("PENDING_TRANSACTION_REVIEW")
                          Transacción en validación manual
                          @break
                        @case("PENDING_TRANSACTION_CONFIRMATION")
                          Recibo de pago generado. En espera de pago
                          @break
                        @case("PENDING_TRANSACTION_TRANSMISSION")
                            Transacción no permitida
                          @break 
                        @case("PENDING_PAYMENT_IN_ENTITY")
                          Recibo de pago generado. En espera de pago
                          @break
                        @case("PENDING_PAYMENT_IN_BANK")
                          Recibo de pago generado. En espera de pago
                          @break
                        @case("PENDING_SENT_TO_FINANCIAL_ENTITY")
                          En espera de confirmación del banco
                          @break
                        @case("PENDING_AWAITING_PSE_CONFIRMATION")
                          En espera de confirmación de PSE
                          @break
                        @case("PENDING_NOTIFYING_ENTITY")
                          Recibo de pago generado. En espera de pago
                          @break 
                        @default
                            En espera de confirmación
                      @endswitch
                    
                    </p>
                    <p class="text-xl mt-2"><b class="text-base text-gray-700">Estado:</b> <br> {{$pay_data['lapTransactionState']}}</p>
                  </div>
                  
                  <hr class="my-8">
                  <div>
                    <a class="block text-center w-full bg-secundary-700 text-gray-50 transition ease-in-out duration-300 font-bold p-4 rounded hover:bg-transparent hover:text-secundary-700 border-secundary-700 border" href="{{route('home')}}">
                      Regresa a la página de inicio
                    </a>
                  </div>
                </div>
            </div>
          </div>
          <div class="mt-12">
              <h3 class="text-lg text-gray-700 text-center font-bold mb-4">Comparte este curso con tus amigos</h3>
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
      @break
    @endswitch
  </div>
<x-slot name="js"></x-slot>
</x-app-layout>