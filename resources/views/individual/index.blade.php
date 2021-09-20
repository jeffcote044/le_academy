<x-app-layout>
    <section class="bg-gradient-to-bl from-secundary-100 via-secundary-400 to-secundary-700" x-data="data()" id="tabNav">
        <div class="container py-24">
            <h2 class="text-center font-extrabold text-3xl md:text-5xl max-w-2xl mx-auto leading-none text-gray-50">¿Quieres llevar tu negocio a otro nivel?</h2>
            
            
            <div class=" my-8 md:hidden">
                <ul class="grid grid-cols-3 text-xs font-bold text-center">
                    <li class="px-2 py-4 border border-gray-50 text-gray-50 rounded-l-lg" x-bind:class="{ 'bg-secundary-100 text-primary-100': selected == 'option-1' }">
                        <a href="#option-1" @click.prevent="opt('option-1')">Grupal</a>
                    </li>
                    <li class="px-2 py-4 border border-gray-50 text-gray-50" x-bind:class="{ 'bg-secundary-100 text-primary-100': selected == 'option-2'}">
                        <a href="#option-2" @click.prevent="opt('option-2')">1 on 1</a>
                    </li>
                    <li class="px-2 py-4 border border-gray-50 text-gray-50 rounded-r-lg" x-bind:class="{ 'bg-secundary-100 text-primary-100': selected == 'option-3' }">
                        <a href="#option-3" @click.prevent="opt('option-3')">Virtual</a>
                    </li>
                  </ul>
            </div>
            
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-x-4 md:grid-cols-3 md:gap-x-8">
                    <div class="px-10 py-8 bg-secundary-700 shadow-xl border-4 border-secundary-700 rounded-lg allways" x-show.transition.in.opacity.duration.500ms="selected == 'option-1'">    
                        <div class="text-gray-50 mb-8">
                            <h2 class=" text-4xl md:text-5xl leading-none font-bold">Grupal</h2>
                            <div>
                                <p class="text-xl md:text-3xl font-bold">250,00 US$ <small class="text-sm font-normal">(Único pago)</small></p>
                            </div>
                        </div>
                        <div class=" text-gray-50">
                            <h3 class=" font-bold mb-6">Este plan incluye</h3>
                            <ul>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                            </ul>
                            <div class="text-center mt-8">
                                <a href="{{route('courses.index')}}" class="block font-bold px-8 py-2 text-lg border border-gray-50 text-gray-50 rounded-full hover:bg-transparent hover:border-gray-400 hover:text-gray-400 transition duration-300 ease select-none" >Empieza ahora</a>
                            </div>
                        </div>     
                    </div>
                    <div class="px-10 py-8 bg-secundary-700 shadow-xl relative allways" x-show.transition.in.opacity.duration.500ms="selected == 'option-2'">
                        <span class="absolute block w-full top-0 left-0 -mt-7 py-1 text-center text-gray-50  uppercase font-bold text-xs  border-4 border-primary-100 rounded-t-lg bg-primary-100 ">El favorito de los clientes</span>
                        <div class="text-primary-100 mb-8">
                            <h2 class=" text-4xl md:text-5xl leading-none font-bold">One on One</h2>
                            <div>
                                <p class="text-xl md:text-3xl font-bold">500,00 US$ <small class="text-sm font-normal">(Único pago)</small></p>
                                <small class="text-base">Antes: <span class="line-through">997,00 US$</span></small>
                            </div>
                        </div>
                        <div class=" text-gray-50">
                            <h3 class=" font-bold mb-6">Este plan incluye</h3>
                            <ul>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                            </ul>
                            <div class="text-center mt-8">
                                <a href="{{route('courses.index')}}" class="block font-bold px-8 py-2 text-lg border border-accent-400 bg-accent-400 text-primary-100 rounded-full hover:bg-transparent hover:text-accent-400 transition duration-300 ease select-none" >Empieza ahora</a>
                            </div>
                            <div class="absolute left-0 right-0 top-full py-2 px-4 text-center rounded-b-lg bg-secundary-100 text-gray-50 font-semibold">
                                TERMINA EN <span data-countdown="2021-04-20 23:59:59" id="countdown" ></span> 
                            </div>
                        </div>
                    </div>
                    <div class="px-10 py-8 bg-secundary-700 shadow-xl border-4 border-secundary-700 rounded-lg allways" x-show.transition.in.opacity.duration.500ms="selected == 'option-3'">
                        <div class="text-gray-50 mb-8">
                            <h2 class=" text-4xl md:text-5xl leading-none font-bold">Virtual</h2>
                            <div>
                                <p class="text-xl md:text-3xl font-bold">99,00 US$ <small class="text-sm font-normal">(Único pago)</small></p>
                            </div>
                        </div>
                        <div class=" text-gray-50">
                            <h3 class=" font-bold mb-6">Este plan incluye</h3>
                            <ul>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                                <li class="mb-3"><i class="fas fa-check mr-2"></i> Acceso a todos los cursos</li>
                            </ul>
                            <div class="text-center mt-8">
                                <a href="{{route('courses.index')}}" class="block font-bold px-8 py-2 text-lg border border-gray-50 text-gray-50 rounded-full hover:bg-transparent hover:border-gray-400 hover:text-gray-400 transition duration-300 ease select-none" >Empieza ahora</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container py-12 md:py-20">
                <h2 class="text-center font-extrabold text-3xl md:text-5xl max-w-2xl mx-auto leading-none text-gray-50 mb-12">Preguntas frecuentes</h2>
                <div class=" max-w-4xl mx-auto" x-data="{selected:null}">
                    <ul class="text-gray-50">
                                    
                        <li class="relative mb-4 rounded-lg bg-secundary-700">
            
                            <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 1 ? selected = 1 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-bold md:text-xl">¿Qué obtengo con la membresía?</span>
                                    <span class="fas " x-bind:class="{ 'fa-chevron-up': selected == 1 , 'fa-chevron-down': selected !== 1 }"></span>
                                </div>
                            </button>
                
                            <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                <div class="px-6 pt-4 pb-6">
                                    <p class="text-base md:text-lg">Vas a poder tener acceso ilimitado a todos nuestros cursos del catálogo, así como beneficios y servicios exclusivos para la comunidad Premium.</p>
                                </div>
                            </div>
            
                        </li>
                
                        <li class="relative mb-4 rounded-lg bg-secundary-700">
                
                            <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-bold md:text-xl">¿Qué incluye la asesoria?</span>
                                    <span class="fas " x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                                </div>
                            </button>
                
                            <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                <div class="px-6 pt-4 pb-6">
                                    <p class="text-base md:text-lg">Los cursos están divididos en módulos, cada uno con un grupo de videoclases. Además, cuentan con archivos adjuntos para complementar tu aprendizaje. Cada curso te da acceso a un foro exclusivo donde los estudiantes de ese curso, profesor y equipo de atención interactúan. Finalmente, te damos la oportunidad de que construyas un proyecto y lo compartas con toda la comunidad para poder acceder a la certificación oficial de Crehana.</p>
                                </div>
                            </div>
                        </li>
                
                        <li class="relative mb-4 rounded-lg bg-secundary-700">
                
                            <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-bold md:text-xl">¿Hay tarifas especiales para equipos de trabajo?</span>
                                    <span class="fas " x-bind:class="{ 'fa-chevron-up': selected == 3 , 'fa-chevron-down': selected !== 3 }"></span>
                                </div>
                            </button>
                
                            <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                <div class="px-6 pt-4 pb-6">
                                    <p class="text-base md:text-lg">¡Sí! Contáctanos para poder darte mayor información sobre las tarifas para tu equipo.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
    <section class="py-16 bg-secundary-700 bg-opacity-95">
        <div class="container text-gray-50">
            <p class="uppercase text-primary-100 font-medium text-sm md:text-lg">¿Quieres saber cual es la mejor opción para ti?</p>
            <a href="mailto:hello%40mediasocial.co" class="text-2xl md:text-6xl font-bold flex items-center leading-none my-4 transition duration-300 ease select-none hover:text-gray-300 hover:underline " title="Escríbeme">
                <span  class="rev email">laicosaidem</span>
            </a>
        </div>
    </section>
@push('scripts')
    <script>

        function data() {
            return {
                selected: 'option-2',
                opt (opt){
                    this.selected = opt
                },
                movile: true
            }
        }

    </script>

    <script>
        // Set the date we're counting down to
        let countdown = document.getElementById('countdown');
        let countdownData = countdown.dataset.countdown;
        var countDownDate = new Date(countdownData).getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = (Math.floor(distance / (1000 * 60 * 60 * 24)));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Time validate and HTML
        let daysHtml = "<span>"+ days.toString().padStart(2, '0') + "<small>D</small> </span>";
        let hoursHtml = "<span>"+ hours.toString().padStart(2, '0') + "<small>H</small> </span>";
        let minutesHtml = "<span>"+ minutes.toString().padStart(2, '0') + "<small>M</small> </span>";
        let secondsHtml = "<span>"+ seconds.toString().padStart(2, '0') + "<small>S</small></span>";
        // Display the result in the element with id="demo"
        countdown.innerHTML = daysHtml + "<span> : </span>" + hoursHtml + "<span> : </span>" + minutesHtml + "<span> : </span>" + secondsHtml;
        
        }, 1000); 
    </script>
@endpush
</x-app-layout>