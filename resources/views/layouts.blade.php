<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desert Storm Egypt Tours @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
        @vite('resources/js/Common.js')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    </head>
    <body class="m-0 p-0 scroll-smooth">
        @yield('content')
        @component('components.Sections.FaqSec')@endcomponent
        <div  class="fixed end-6 bottom-6 group z-50 flex items-center justify-center rounded-full p-2 gap-2 text-white cursor-pointer bg-[#128C7E] hover:bg-[#25D366]
         font-semibold">

                <a href="https://api.whatsapp.com/send?phone=201101833336">
                    <i class="fa fa-whatsapp transition-transform" style="font-size: 1.6rem"></i>
                </a>
            <span>WhatApp Me</span>
        </div>
        <div id="footer">
        @component('components.footer')
        @endcomponent
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
