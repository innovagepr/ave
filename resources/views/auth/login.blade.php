<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('images/avelogo.ico')}}">
<!-- Page Title -->
<head>
    <title>AVE - Iniciar Sesión</title>
    <style>
        html{
            overflow-x: hidden;
            box-sizing: border-box;
            padding: 0px;
        }
    </style>
</head>

<!-- Stylesheets and relevant script sources -->
<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">

<!-- Link to homepage -->
<i type="button" onclick="location.href='/homepage'" style="float: left; cursor: pointer; color: #8F8F8F; padding-left: 10px; padding-top: 10px;">
    <span class="fa fa-home fa-5x"></span>
</i>
<!-- Allows for validation of user account information -->
    <x-jet-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

<!-- Login form -->
    <div class="container-fluid mt-4" style="background-color:#FFFFFF; width: 60%; font-size: 2rem; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
    <form method="POST" action="{{ route('login') }}">
        @csrf
                <div class="mt-4">
            <a style="color: #2576AC; font-size:4rem;">{{ __('Iniciar Sesión') }}</a>
        </div>
        <div class="mt-2">
            <x-jet-label for="email" value="{{ __('Email:') }}" style="display: inline-block; text-align: left; padding-right: 7%;" />
            <x-jet-input id="email" type="email" style="display: inline-block; width:63%;" name="email" placeholder="Escriba su correo electrónico" :value="old('email')" required autofocus />
        </div>

        <div class="mt-4">
            <x-jet-label for="password" class="inline-flex" value="{{ __('Contraseña:') }}" style="display: inline-block; text-align: left;" />
            <x-jet-input id="password" class="mt-2 w-3/4 inline-flex justify-center" type="password" style="display: inline-block; width:63%;" name="password" placeholder="Escriba su contraseña" required autocomplete="current-password" />
        </div>

        <div class="mt-4">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember" style="display: inline-block; text-align: left;">
                <span>{{ __('Recordar usuario') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <button class="ml-4 button button1">
                {{ __('Iniciar sesión') }}
            </button>
        </div>
        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="color: #398BF6; font-size: 1.5rem; text-align: left;">
                    {{ __('¿Olvidó su contraseña?') }}
                </a>
            @endif
        </div>
        <div><hr class="mt-4" style="width:96%; border-color: #2576AC; border-width:2px; border-style: solid;"></div>
        <div class="mt-4" style="color: #2576AC;">
            <a>
                {{ __('¿No tiene cuenta aún?') }}
            </a>
        </div>
    </form>
    <form method="GET" action="{{ route('register') }}">
        @csrf
        <div class="mt-4">
            <button class="button button1">
                {{ __('Crear Cuenta') }}
            </button>
        </div>

    </form>
    </div>

<!-- Footer with modal for contact information and information about team -->
    @extends('layouts/contactModalLayout')
    <footer class="footer">
        <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
        <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
        <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

    </footer>
</body>
