<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('images/avelogo.ico')}}">
<!-- Page Title -->
<head>
    <title>AVE - Restablecer Contraseña</title>
    <style>
        html{
            overflow-x: hidden;
            box-sizing: border-box;
            padding: 0px;
        }
    </style>
    <!-- Stylesheets and relevant script sources -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
</head>

<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">
<!-- Link to homepage -->
<i type="button" onclick="location.href='/'" style="float: left; cursor: pointer; color: #8F8F8F; padding-left: 10px; padding-top: 10px;">
    <span class="fa fa-home fa-5x"></span>
</i>


<div class="container pt-8" style="background-color:#FFFFFF; width: 60%; font-size: 1.25rem; margin-top: 10%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
    <!-- Forgot Password form -->
    @if (session('status'))
        <div class="mb-4 font-large text-lg text-green-600" style="color:green; font-size: 1.4rem;">
            {{ session('status') }}
        </div>
@endif<!-- Allows for validation of user account information -->
    <x-jet-validation-errors class="mb-4 text-danger error" />
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


</div>
<!-- Footer with modal for contact information and information about team -->
@extends('layouts/contactModalLayout')
<footer class="footer">
    <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
    <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
    <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

</footer>
</body>
