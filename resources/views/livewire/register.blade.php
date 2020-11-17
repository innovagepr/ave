<div>
    {{-- In work, do what you enjoy. --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/avelogo.ico')}}">
    <!-- Page Title -->
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
    <!-- Stylesheets and relevant script sources -->
    <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
    <body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">
    <!-- Link to homepage -->
    <div wire:ignore wire:key="test1">
    <i type="button" onclick="location.href='/homepage'" style="float: left; cursor: pointer; color: #8F8F8F; padding-left: 10px; padding-top: 10px;">
        <span class="fa fa-home fa-5x"></span>
    </i>
    </div>
    <!-- Allows for validation of user account information -->
    <x-jet-validation-errors class="mb-4" />
    <!-- Registration form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container mt-4" style="background-color:#FFFFFF; width: 40%; font-size: 1.5rem; display:block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
            <div class="mt-2">
                <a style="color: #2576AC; font-size: 2rem;">{{ __('Complete su información') }}</a>
            </div>
            <div class="mt-2">
                <x-jet-label for="first_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="first_name" type="text" style="display: inline-block; width:80%;" name="first_name" placeholder="Escriba su nombre" :value="old('first_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-0">
                <x-jet-label for="last_name" value="{{ __('Apellido:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="last_name" type="text" style="display: inline-block; width:80%;" name="last_name"  placeholder="Escriba su apellido" :value="old('last_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-0">
                <x-jet-label for="email" value="{{ __('Email:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="email"  type="email" style="display: inline-block; width:80%;" name="email" placeholder="Escriba su correo electrónico" :value="old('email')" required />
            </div>

            <div class="mt-0">
                <x-jet-label for="password" value="{{ __('Contraseña:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="password"  type="password" style="display: inline-block; width:80%;" name="password" placeholder="**********" wire:model="test" required autocomplete="new-password" />
            </div>
            <div class="mt-0">
                <div class="mt-0">
                    @if(strlen($test) >= 8)
                        <span class="far fa-check-square"></span>
                    @else
                        <span class="far fa-square"></span>
                    @endif
                    {{ 'Contiene 8 caracteres' }}
                </div>


                @if(preg_match('/\\d/', $test) === 1)
                    <div> {{ __('Password passes number constraint') }}</div>
                    @endif
                    @if(preg_match('/[^a-zA-Z\d]/', $test) === 1)
                        <div> {{ __('Password passes Special character constraint') }}</div>
                    @endif
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
                <x-jet-label for="role_id" value="{{ __('Tipo de cuenta:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <select id="role_id" type="select" style="display: inline-block; width:80%;" name="role_id" required>
                    <option value="1">{{ __('Profesional') }}</option>
                    <option value="2">{{ __('Estudiante') }}</option>
                </select>
            </div>
            <div class="mt-4">
                <label for="accepted_terms" style="display: block; text-align: left; padding-left: 10%;">
                    <input id="accepted_terms" type="checkbox" class="form-checkbox" name="accepted_terms" required>
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

    <!-- Footer with modal for contact information and information about team -->
    @extends('layouts/contactModalLayout')
    <footer class="footer">
        <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
        <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
        <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

    </footer>
    </body>

</div>
