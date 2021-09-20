<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        
        <style>
            body {
                font-family: 'Poppins' !important;
            }
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body id="page" class="font-sans antialiased"> 
        <div class="relative flex flex-col items-top justify-center h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col items-center pt-8 sm:justify-start sm:pt-0">
                    @yield('image')
                    <div class="text-lg text-center text-gray-900 tracking-wider">
                        <h2 class="text-3xl font-bold">Opps! Algo no está bien</h2>
                        <p class="mt-4 text-base text-gray-500">
                            @yield('message')
                        </p>
                        <a href="/" class="inline-block mt-8 font-bold px-8 py-4 rounded-full border border-primary-100 bg-primary-100 text-gray-900 hover:bg-transparent hover:text-primary-100" >Volver a la página principal</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>


