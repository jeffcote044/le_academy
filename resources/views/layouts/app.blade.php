<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cursos') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Poppins' !important;
            }
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
        @livewireStyles
        @isset($css){{$css}}@endisset
        @stack('styles')

        <!-- Scripts -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>


        @stack('scriptsHead')

        @isset($scriptsHead){{$scriptsHead}}@endisset
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '561438354889320');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=561438354889320&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    </head>
    <body id="page" class="font-sans antialiased  ">

        @stack('scriptsBodyStart')



        <div class="fixed left-0 bottom-0 p-6 sm:p-10 z-50"> @include('cookieConsent::index') </div>
        <div class="min-h-screen bg-white">
            @livewire('navigation-dropdown')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="bg-secundary-700 py-4">
            <div class="container">
                <nav class="mb-4 hidden">
                    <div>
                        <a href="/">
                        <img src="{{asset('img/logos/svg/iso-media-social.svg')}}" alt="" class="h-6 w-auto"></a>
                    </div>
                </nav>
                <nav class="grid_ grid-cols-1 md:grid-cols-4  gap-x-8 text-sm text-gray-400 hidden">
                    <div class="mb-4 md:mb-0">
                        <p class="text-sm">Creamos estrategias que te ayudarán a posicionar tu negocio y vender más a través de internet.</p>
                    </div>
                    <div>
                        <header class="mt-4 md:mt-0">
                            <h3 class="text-gray-50 font-semibold">Explora</h3>
                        </header>
                        <ul>
                            <li>
                                <a href="" class="mt-2 inline-block hover:underline">Cursos</a>
                            </li>
                            <li>
                                <a href="" class="mt-2 inline-block hover:underline">Personalizado</a>
                            </li>
                            <li>
                                <a href="" class="mt-2 inline-block hover:underline">Blog</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <header class="mt-4 md:mt-0">
                            <h3 class="text-gray-50 font-semibold">Contacto</h3>
                        </header>
                        <ul>
                            <li>
                                <a href="mailto:hello%40mediasocial.co" class="mt-2 inline-block hover:underline"><span  class="rev email">laicosaidem</span></a>
                            </li>
                            <li>
                                <a href="tel:+573155217037" class="mt-2 inline-block hover:underline">57.315.521.7037</a>
                            </li>
                            <li>
                                <p class="mt-2 cursor-default">Bucaramanga, CO</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <header class="mt-4 md:mt-0">
                            <h3 class="text-gray-50 font-semibold">Siguenos en</h3>
                        </header>
                        <ul>
                            <li>
                                <a href="" class="mt-2 inline-block hover:underline">Facebook</a>
                            </li>
                            <li>
                                <a href="" class="mt-2 inline-block hover:underline">Instagram</a>
                            </li>
                            <li>
                                <a href="" class="mt-2 inline-block hover:underline">LinkedIn</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div>
                    @stack('footerText')
                    <hr class=" border-gray-700 my-2">
                    <div class="text-gray-400 text-xs">© {{Carbon\Carbon::now()->year}} <span class="text-primary-100">Media Social</span> Marketing Digital. Todos los derechos reservados.</div>
                </div>
            </div>
        </footer>

        <script type="text/javascript">
            (function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
            vgo('setAccount', '91042934');
            vgo('setTrackByDefault', true);

            vgo('process');
        </script>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        @isset($js){{$js}}@endisset
    </body>
</html>
