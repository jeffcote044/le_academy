<div>
    <div class="w-full sm:px-6 lg:px-0 grid grid-cols-1 md:grid-cols-4">
        <div class="col-span-3 bg-gray-50" x-data="data()" x-on:resize.window="(window.innerWidth <= 768) ? opt('4') : opt('1')" >
            <article class="embed-responsive" id="embedResponsive">
                {!!$current->iframe!!}
            </article>
            <div class="bg-gradient-to-b from-secundary-400  to-secundary-700">
                <div class=" py-6 px-4 w-full">
                    <div class=" flex font-semibold text-gray-50 text-sm md:text-base">
                        @if ($this->previous) <a class="bg-gray-400 py-2 px-4 md:p-4 rounded-lg bg-opacity-25  cursor-pointer transition ease-in-out duration-300 hover:text-primary-100 "  href="{{route('courses.lesson', [$course , $this->previous])}}" title="{{$this->previous->name}}" ><i class="fas fa-caret-left mr-1"></i>Anterior</a>@endif
                        @if ($this->next) <a class=" bg-gray-400 py-2 px-4 md:p-4 rounded-lg bg-opacity-25 ml-auto cursor-pointer transition ease-in-out duration-300 hover:text-primary-100" href="{{route('courses.lesson', [$course , $this->next])}}" title="{{$this->next->name}}" >Siguiente<i class="fas fa-caret-right ml-1 "></i></a>@endif
                    </div>
                </div>
                <div class="text-gray-50 md:px-4 text-xs md:text-base grid grid-cols-4 md:flex gap-x-2 max-w-2xl">
                    <button class=" md:hidden font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2  transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '4', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '4'}" @click.prevent="opt('4')">Contenido</button>
                    <button class="font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2  transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '1', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '1'}" @click.prevent="opt('1')">Descripción</button>
                    <button class="font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2 transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '2', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '2' }"@click.prevent="opt('2')">Preguntas <span class="hidden md:inline">y respuestas</span></button>
                    <button class="font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2 transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '3', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '3' }"@click.prevent="opt('3')">Notas</button>
                </div>
            </div>

            <section class="max-w-5xl px-4 mx-auto my-16">

                <section class="md:hidden" x-show.transition.in.opacity.duration.300ms="selected == '4'">
                    <x-course-content :course="$course" :current="$current" :self="$this"/>
                </section>

                <div x-show.transition.in.opacity.duration.300ms="selected == '1'">

                    <h1 class="font-bold text-xl leading-6 md:text-3xl text-gray-900 mt-4">{{$current->name}}</h1>
                    @if ($current->description)
                        <div class="text-gray-600 text-sm md:text-base mt-4">{!!$current->description->name!!}</div>
                    @endif
                </div>
                <div x-show.transition.in.opacity.duration.300ms="selected == '2'">
                    @livewire('courses-comments', ['lesson' => $current], key("lesson-comments-".$current->id))
                </div>
    
                <div x-show.transition.in.opacity.duration.300ms="selected == '3'">                 
                    @livewire('courses-notes', ['lesson' => $current], key("lesson-notes-".$current->id))
   
                </div>
            </section>
        </div>

        <div id="sticky-card"  class="bg-white shadow-sm relative hidden md:block">
            <div class="sticky top-2">
                
                <section class="pb-4">
                    <x-course-content :course="$course" :current="$current" :self="$this"/>
                </section>
            </div>
        </div>
    </div>
</div>
<x-slot name="css">
    <style>
        .ytp-svg-fill {
            fill: #fff;
        }
        .ytp-svg-autoplay-ring{
            animation: dash 5s linear;
            animation-fill-mode: forwards;
        }
        .ytp-svg-pause{
            animation-play-state: paused;
        }
        @keyframes dash {
            to {
                stroke-dashoffset: 0;
            }
        }
        
        #countdown{
            grid-template-columns: 1fr 10px 1fr 10px 1fr 10px 1fr;
        }
        #countdown > span{
            background-color: #fc0;
            text-align: center;
            height: 4rem;
            width: 4rem;
            line-height: 4rem;
            border-radius: .5rem;
        }
        #countdown >  i{
            height: 4rem;
            width: 4rem;
            line-height: 4rem;
            text-align: center;
            width: 0.5rem !important;
            font-style: normal !important;
        }
    </style>
</x-slot>


@push('scripts')
    <!--Include the Vimeo API Library-->
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        function addElementUpnext (next) {
            let newNode = document.createElement("div");
            let classesToAdd = [ 'upnext', 'flex', 'justify-center', 'absolute', 'z-50', 'bg-gray-900', 'bg-opacity-50', 'text-white', 'inset-0'];
            newNode.classList.add(...classesToAdd);
            let newContent = '<div class="flex flex-col justify-center items-center"><div class="text-center mb-6"><p class="mb-1 text-base">A continuación</p><h2 class="text-2xl font-bold">'+ next.name +'</h2></div><a onClick="upnextGo()" class="cursor-pointer"><svg height="100px" version="1.1" viewBox="0 0 72 72" width="100%"><circle class="ytp-svg-autoplay-circle" cx="36" cy="36" fill="#fff" fill-opacity="0.3" r="31.5"></circle><circle class="ytp-svg-autoplay-ring" cx="-36" cy="36" fill-opacity="0" r="33.5" stroke="#FFFFFF" stroke-dasharray="211" stroke-dashoffset="211" stroke-width="4" transform="rotate(-90)"></circle><path class="ytp-svg-fill" d="M 24,48 41,36 24,24 V 48 z M 44,24 v 24 h 4 V 24 h -4 z"></path></svg></a><button class="mt-6 uppercase font-medium"  onClick="upnextStop()">Cancelar</button></div>';
            newNode.innerHTML = newContent; 
            let parentDiv = document.querySelector("#embedResponsive iframe").parentNode;
            let upnext_div = document.querySelector("#embedResponsive iframe")
            parentDiv.insertBefore(newNode, upnext_div);
        }

        function upnextStop(){
            clearTimeout(upnext);
            let play_btn = document.querySelector('.ytp-svg-autoplay-ring');
            play_btn.classList.add('ytp-svg-pause')
        }

        function upnextGo(){
            @this.completed();
            @this.changeLesson({!!$this->next!!});
        }

        const PLAYER = new Vimeo.Player(document.querySelector('.embed-responsive iframe'));
        let next;
        next = {!!$this->next!!}
        PLAYER.on('ended', function() {
            if(next != undefined){
                addElementUpnext(next)
                upnext = setTimeout(upnextGo, 5000);
            }
        });
    </script>

    @if ($course->discount)

        <script>
            const PROMO_AD = sessionStorage.getItem('promoAd');
            let promoAdDiv = document.getElementById("promoAd");
            
            if(PROMO_AD == "false"){
                promoAdDiv.remove();
            } else{

                promoAdDiv.innerHTML= '<div  class="flex items-center justify-center flex-col px-4 py-8 mx-4 my-4 border-yellow-400 border-dashed border-2 relative"><i  x-on:click="$open = !$open; sessionStorage.setItem(\'promoAd\', false)" class="fas fa-times absolute right-0 top-0 mr-2 mt-2 cursor-pointer" title="Cerrar"></i> <h3 class="text-xl font-bold">🎁 40% de descuento en todos los cursos</h3> <p class="text-base  text-gray-400 uppercase my-2">La oferta termina en:</p> <div data-countdown="2021-03-01 23:59:59" id="countdown" class="font-bold text-2xl grid gap-1 mb-4 h-16"></div><a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border border-blue-700 rounded uppercase">Quiero mi 40% de descuento</a></div>';      
                
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
                let daysHtml = "<span>"+ days.toString().padStart(2, '0') + "<small>d</small> </span>";
                let hoursHtml = "<span>"+ hours.toString().padStart(2, '0') + "<small>h</small> </span>";
                let minutesHtml = "<span>"+ minutes.toString().padStart(2, '0') + "<small>m</small> </span>";
                let secondsHtml = "<span>"+ seconds.toString().padStart(2, '0') + "<small>s</small></span>";
                // Display the result in the element with id="demo"
            countdown.innerHTML = daysHtml + "<i>:</i>" + hoursHtml + "<i>:</i>" + minutesHtml + "<i>:</i>" + secondsHtml;
                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    countdown.innerHTML = "<p class='col-span-7 mt-auto mb-auto'>EXPIRED</p>";
                }
                }, 1000);
            }   
        </script>
    @endif

    <script>

        function data() {
            let w = window.innerWidth;
            let select = 4;   
            if(w > 768){
                if(window.location.hash) {
                    if(window.location.hash == '#questions'){
                        select = 2
                    }else{
                        select = 1 
                    }
                }else{
                    select = 1 
                }
            }
            return {
                selected: select,
                opt (opt){
                    this.selected = opt
                },
                movile: true
            }
        }

    </script>

@endpush