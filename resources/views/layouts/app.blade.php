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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="icon" href="{{asset('avelogo.ico')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    $("#main-content").attr("margin-left", "100px");

                });
                $("#menu-toggle-top").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                    $("#top-bar").toggleClass("hidden");
                    $("#main-content").attr("margin-left", "120pxrem");

                });

            })
        </script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>

        <style>
            body {
                overflow-x: hidden;
            }

            .bg-main{
                background-color:#e5fcfb;
            }

            .menu-item-active{
                display: inline-flex;
                place-items: center;
                /*border-bottom: #073c63 2px solid;*/
                --border-opacity: 1;
                border-color: #073c63;
                border-color: rgba(7, 60, 99, var(--border-opacity));
                font-size: 1rem;
                font-weight: 800;
                --text-opacity: 1;
                color: #073c63;
                color: rgba(7, 60, 99, var(--text-opacity));
            }

            .bg-menu{
                background-color: #acf9a4;
            }
            #sidebar-wrapper {
                min-height: 100vh;
                margin-left: -15rem;
                -webkit-transition: margin .25s ease-out;
                -moz-transition: margin .25s ease-out;
                -o-transition: margin .25s ease-out;
                transition: margin .25s ease-out;
            }
            #sidebar-wrapper .sidebar-heading {
                padding: 0.875rem 1.25rem;
                font-size: 1.2rem;
            }
            #sidebar-wrapper .menu-bar {
                width: 15rem;
            }
            #page-content-wrapper {
                min-width: 100vw;
                margin-left: auto;
                margin-right:auto;
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }

            .sidebar-border{
                /*border: #073c63 1px solid;*/
            }

            .menu-item-action{
                width:100%;
                color:#495057;
                text-align:inherit
            }
            .menu-item-action:focus,.menu-item-action:hover {
                z-index:1;
                color:#495057;
                text-decoration:none;
                background-color:#ACF9A4;
            }
            .menu-item-action:active {
                color: #212529;
                background-color: darkseagreen;
            }

            .menu-item{
                position:relative;
                display:block;
                padding:.6rem 1.25rem;
                background-color:#ACF9A4;
                /*border:1px solid #073c63;*/
                color: #073c63;
                font-weight: bold;
            }
            .menu-item:first-child{
                border-top-left-radius:inherit;
                border-top-right-radius:inherit
            }
            .menu-item:last-child{
                border-bottom-right-radius:inherit;
                border-bottom-left-radius:inherit
            }
            .menu-item.disabled,.menu-item:disabled{
                color:#6c757d;
                pointer-events:none;
                background-color:#fff
            }
            .menu-item.active{
                z-index:2;
                color:#073c63;
                background-color:#ACF9A4;
                border-color:#007bff
            }
            .menu-item+.menu-item{
                border-top-width:0
            }
            .menu-item+.menu-item.active{
                margin-top:-1px;
                border-top-width:1px
            }
            .menu-bar-horizontal{
                -ms-flex-direction:row;
                flex-direction:row
            }
            .menu-bar-horizontal>.menu-item:first-child{
                border-bottom-left-radius:.25rem;
                border-top-right-radius:0
            }
            .menu-bar-horizontal>.menu-item:last-child{
                border-top-right-radius:.25rem;
                border-bottom-left-radius:0
            }
            .menu-bar-horizontal>.menu-item.active{
                margin-top:0
            }
            .menu-bar-horizontal>.menu-item+.menu-item{
                border-top-width:1px;border-left-width:0
            }
            .menu-bar-horizontal>.menu-item+.menu-item.active{
                margin-left:-1px;
                border-left-width:1px
            }
            .menu-bar-flush{border-radius:0}
            .menu-bar-flush>.menu-item{border-width:0 0 1px}
            .menu-bar-flush>.menu-item:last-child{border-bottom-width:0}

            .hidden {
                display: none;
            }

            .block {
                display: block;
            }


            .navbar{
                position:relative;
                display:-ms-flexbox;
                /*display:flex;*/
                -ms-flex-wrap:wrap;
                flex-wrap:wrap;
                -ms-flex-align:center;
                align-items:center;
                -ms-flex-pack:justify;
                justify-content:space-between;
                padding:.3rem 1rem
            }

            .collapse:not(.show){
                display:none
            }

            .navbar-collapse{
                -ms-flex-preferred-size:100%;
                flex-basis:100%;
                -ms-flex-positive:1;
                flex-grow:1;
                -ms-flex-align:center;
                align-items:center
            }

            .line {
                border-bottom: 2px #073c63 solid;
            }

            .sidebar-footer {
                bottom:0;
            }

        </style>
    </head>
    <body class=" bg-main font-sans antialiased">
    <div class="d-flex" id="wrapper">
        @livewire('aside-nav')
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
