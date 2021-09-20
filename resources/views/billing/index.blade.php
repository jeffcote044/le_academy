<x-app-layout>
    

    <section class="bg-gradient-to-bl from-secundary-100 via-secundary-400 to-secundary-700" x-data="data()" id="tabNav">
        <div class="container py-24">
            <h2 class="text-center font-extrabold text-3xl md:text-5xl max-w-2xl mx-auto leading-none text-gray-50">Planes y Precios</h2>
            
            
            <div class=" my-8 md:hidden">
                <ul class="grid grid-cols-3 text-xs font-bold text-center">
                    <li class="px-2 py-4 border border-gray-50 text-gray-50 rounded-l-lg" x-bind:class="{ 'bg-secundary-100 text-primary-100': selected == 'option-1' }">
                        <a href="#option-1" @click.prevent="opt('option-1')">Trimestal</a>
                    </li>
                    <li class="px-2 py-4 border border-gray-50 text-gray-50" x-bind:class="{ 'bg-secundary-100 text-primary-100': selected == 'option-2'}">
                        <a href="#option-2" @click.prevent="opt('option-2')">Anual</a>
                    </li>
                    <li class="px-2 py-4 border border-gray-50 text-gray-50 rounded-r-lg" x-bind:class="{ 'bg-secundary-100 text-primary-100': selected == 'option-3' }">
                        <a href="#option-3" @click.prevent="opt('option-3')">Mensual</a>
                    </li>
                  </ul>
            </div>
            
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-x-4 md:grid-cols-3 md:gap-x-8">
                    <div class="px-10 py-8 bg-secundary-700 shadow-xl border-4 border-secundary-700 rounded-lg allways" x-show.transition.in.opacity.duration.500ms="selected == 'option-1'">    
                        <div class="text-gray-50 mb-8">
                            <h2 class=" text-4xl md:text-5xl leading-none font-bold">Trimestal</h2>
                            <div>
                                <p class="text-xl md:text-3xl font-bold">19,99 US$ <small class="text-sm font-normal">(Pago mensual)</small></p>
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
                                @livewire('subscriptions', ['price'=>'price_1IcEEbDDfgi8u5vQut5PO19M','style'=>'gray'], key('price_1IcEEbDDfgi8u5vQut5PO19M'))
                            </div>
                        </div>     
                    </div>
                    <div class="px-10 py-8 bg-secundary-700 shadow-xl relative allways" x-show.transition.in.opacity.duration.500ms="selected == 'option-2'">
                        <span class="absolute block w-full top-0 left-0 -mt-7 py-1 text-center text-gray-50  uppercase font-bold text-xs  border-4 border-primary-100 rounded-t-lg bg-primary-100 ">El favorito de los estudiantes</span>
                        <div class="text-primary-100 mb-8">
                            <h2 class=" text-4xl md:text-5xl leading-none font-bold">Anual</h2>
                            <div>
                                <p class="text-xl md:text-3xl font-bold">9,99 US$ <small class="text-sm font-normal">(Pago mensual)</small></p>
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
                                @livewire('subscriptions', ['price'=>'price_1IcEEbDDfgi8u5vQKDdoOA4s','style'=>'accent'], key('price_1IcEEbDDfgi8u5vQKDdoOA4s'))                               
                            </div>
                            <div class="absolute left-0 right-0 top-full py-2 px-4 text-center rounded-b-lg bg-secundary-100 text-gray-50 font-semibold">
                                TERMINA EN <span data-countdown="2021-04-20 23:59:59" id="countdown" ></span> 
                            </div>
                        </div>
                    </div>
                    <div class="px-10 py-8 bg-secundary-700 shadow-xl border-4 border-secundary-700 rounded-lg allways" x-show.transition.in.opacity.duration.500ms="selected == 'option-3'">
                        <div class="text-gray-50 mb-8">
                            <h2 class=" text-4xl md:text-5xl leading-none font-bold">Mensual</h2>
                            <div>
                                <p class="text-xl md:text-3xl font-bold">99,00 US$ <small class="text-sm font-normal">(Pago mensual)</small></p>
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
                                @livewire('subscriptions', ['price'=>'price_1IcEEbDDfgi8u5vQ5tUiKWR5','style'=>'gray'], key('price_1IcEEbDDfgi8u5vQ5tUiKWR5'))
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        @livewire('payment-method-create')
    </section>
    <section>
        @livewire('payment-method-list')
    </section>
    <section>
        @livewire('invoices')
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