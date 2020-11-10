<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

{{--        <title>{{ config('app.name', 'AVE') }}</title>--}}
        <title>@yield('title')</title>


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="icon" href="{{asset('avelogo.ico')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>




        @livewireStyles

        <!-- Scripts -->
        <script>
            jQuery(document).ready(function($){
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                    $("#top-bar").toggleClass("hidden");
                    // $("#main-content").attr("margin-left", "100px");

                });
                $("#menu-toggle-top").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                    $("#top-bar").toggleClass("hidden");
                    // $("#main-content").attr("margin-left", "120px");

                });

            })
        </script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>

    </head>
    <body class="bg-main font-sans antialiased">
    <div class="d-flex" id="wrapper">
        @auth
        @livewire('aside-nav')
        @endauth
        <div id="page-content-wrapper">
            @livewire('top-nav')
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>
    </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
