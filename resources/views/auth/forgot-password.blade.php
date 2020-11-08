
{{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">

<i type="button" onclick="location.href='/homepage'" style="float: left; cursor: pointer; color: #8F8F8F; padding-left: 10px; padding-top: 10px;">
    <span class="fa fa-home fa-5x"></span>
</i>
<x-jet-validation-errors class="mb-4" />

@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
<div class="container mt-4" style="background-color:#FFFFFF; width: 60%; font-size: 2rem; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidó su contraseña? No hay problema. Provea el correo electrónico y le enviaremos un enlace para restablecer su contraseña.') }}
    </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="block">
            <x-jet-label for="email" value="{{ __('Correo electrónico:') }}" />
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="button button1">
                {{ __('Enviar enlace') }}
            </button>
        </div>
    </form>
</div>
@extends('layouts/contactModalLayout')
<footer class="footer">
    <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
    <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
    <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

</footer>
</body>
