<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('images/avelogo.ico')}}">

<head>
    <title>AVE - Registrar</title>
    <style>
        html{
            overflow-x: hidden;
            box-sizing: border-box;
            padding: 0px;
        }
    </style>
</head>

{{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">

<i type="button" onclick="location.href='/homepage'" style="float: left; cursor: pointer; color: #8F8F8F; padding-left: 10px; padding-top: 10px;">
    <span class="fa fa-home fa-5x"></span>
</i>

{{--<i type="button" onclick="location.href='/homepage'" style="float: left; cursor: pointer; color: #8F8F8F; padding-top: 800px;">
    <span class="fa fa-arrow-alt-circle-left fa-5x"></span>
</i>--}}

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
        <div class="container mt-4" style="background-color:#FFFFFF; width: 40%; font-size: 1.5rem; display:block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
            <div class="mt-2">
                <a style="color: #2576AC; font-size: 2rem;">{{ __('Complete su información') }}</a>
            </div>
            <div class="mt-2">
                <x-jet-label for="first_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="first_name" type="text" style="display: inline-block; width:80%;" name="name" placeholder="Escriba su nombre" :value="old('first_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-0">
                <x-jet-label for="last_name" value="{{ __('Apellido:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="last_name" type="text" style="display: inline-block; width:80%;" name="name"  placeholder="Escriba su apellido" :value="old('last_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-0">
                <x-jet-label for="email" value="{{ __('Email:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="email"  type="email" style="display: inline-block; width:80%;" name="email" placeholder="Escriba su correo electrónico" :value="old('email')" required />
            </div>

            <div class="mt-0">
                <x-jet-label for="password" value="{{ __('Contraseña:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="password"  type="password" style="display: inline-block; width:80%;" name="password" placeholder="**********" required autocomplete="new-password" />
            </div>

            <div class="mt-0">
                <x-jet-label for="password_confirmation" value="{{ __('Confirme Contraseña:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="password_confirmation"  type="password"  style="display: inline-block; width:80%;" placeholder="**********" name="password_confirmation" required/>
            </div>

            <div class="mt-0">
                <x-jet-label for="dob" value="{{ __('Fecha de Nacimiento:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="dob"  type="date" name="dob" style="display: inline-block; width:80%;" required/>
            </div>

            <div class="mt-0">
                <x-jet-label for="role" value="{{ __('Profesión:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <select id="role" type="select" style="display: inline-block; width:80%;" name="role" required>
                    <option value="1">{{ __('Educador') }}</option>
                    <option value="2">{{ __('Psicólogo') }}</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="accepted_terms" style="display: block; text-align: left; padding-left: 10%;">
                    <input id="accepted_terms" type="checkbox" class="form-checkbox" name="accepted_terms">
                    <span>{{ __('Acepto los términos y condiciones.') }}</span>
                </label>
            </div>

            <div class="mt-4">
                <button class="button button1">
                    {{ __('Completar') }}
                </button>
            </div>
        </div>

        </form>

        @extends('layouts/contactModalLayout')
        <footer class="footer">
            <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
            <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
            <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

        </footer>
</body>
