<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/avelogo.ico')}}">
    <!-- Page Title -->
    <head>
        <title>AVE - Activar Cuenta</title>
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
    <!-- Link to homepage -->
    <i type="button" onclick="location.href='/homepage'" style="float: left; cursor: pointer; color: #8F8F8F; padding-left: 10px; padding-top: 10px;">
        <span class="fa fa-home fa-2x"></span>
    </i>
    <body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">


@if($topActive)
    <div class="container mt-8" style="background-color:#FFFFFF; width: 40%; font-size: 1.25rem; display:block; margin-top: 10%; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
        <!-- Allows for validation of user account information -->
        <x-jet-validation-errors class="mb-4 text-danger error" />
        <div class="mt-2">
            <a style="color: #2576AC; font-size: 2rem;">{{ __('Provea la información provisional de su cuenta') }}</a>
        </div>

        <div class="mt-0">
            <x-jet-label for="email" value="{{ __('Nombre de usuario provisional:') }}" style="display: block; text-align: left; padding-left: 10%;" />
            <x-jet-input id="email"  type="email" style="display: inline-block; width:80%;" name="email" placeholder="Escriba el nombre de usuario provisto" :value="old('email')" wire:model="provisionalUsername" required />
        </div>
        <div class="mt-0">
            <x-jet-label for="password" value="{{ __('Contraseña Provisional:') }}" style="display: block; text-align: left; padding-left: 10%;" />
            <x-jet-input id="password"  type="password" style="display: inline-block; width:80%;" name="password" placeholder="**********" wire:model="provisionalPassword" required autocomplete="new-password" />
        </div>
        <div class="mt-4">
            <button type="submit" class="button button1" wire:click.prevent="checkUser()">
                {{ __('Revisar') }}
            </button>
        </div>
    </div>
    @endif
    <!-- Registration form -->
    @if($userValid)
    <form>
        @csrf
        <div class="container mt-4" style="background-color:#FFFFFF; width: 40%; font-size: 1.5rem; display:block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
            <!-- Allows for validation of user account information -->
            <x-jet-validation-errors class="mb-4" />
            <div class="mt-2">
                <a style="color: #2576AC; font-size: 2rem;">{{ __('Complete su información') }}</a>
            </div>

            <div class="mt-0">
                <x-jet-label for="email" value="{{ __('Email:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="email"  type="email" style="display: inline-block; width:80%;" name="email" placeholder="Escriba su correo electrónico" :value="old('email')" wire:model="email" required />
            </div>

            <div class="mt-0">
                <x-jet-label for="password" value="{{ __('Contraseña nueva:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="password"  type="password" style="display: inline-block; width:80%;" name="password" placeholder="**********" wire:model="password" required autocomplete="new-password" />
            </div>

            <div class="mt-0">
                <div class="mt-0">
                    @if(strlen($password) < 8)
                        <span style="color: red"> {{ 'Debe contener 8 caracteres' }}</span>
                    @else
                        <span style="color: green"> {{ 'Contiene 8 caracteres' }}</span>
                    @endif
                </div>

                <div class="mt-0">
                    @if(preg_match('/\\d/', $password) != 1)
                        <span style="color: red"> {{ 'Debe contener un número' }}</span>
                    @else
                        <span style="color: green"> {{ 'Contiene un número' }}</span>
                    @endif
                </div>
                <div class="mt-0">
                    @if(preg_match('/[^a-zA-Z\d]/', $password) != 1)
                        <span style="color: red"> {{ 'Debe contener un caracter especial' }}</span>
                    @else
                        <span style="color: green"> {{ 'Contiene un caracter especial' }}</span>
                    @endif
                </div>
            </div>
            <div class="mt-0">
                <x-jet-label for="password_confirmation" value="{{ __('Confirme Contraseña nueva:') }}" style="display: block; text-align: left; padding-left: 10%;" />
                <x-jet-input id="password_confirmation"  type="password"  style="display: inline-block; width:80%;" placeholder="**********" wire:model="password_confirmation" name="password_confirmation" required/>
            </div>


            <div class="mt-4">
                <button class="button button1" wire:click.prevent="registerProvisional()">
                    {{ __('Completar') }}
                </button>
            </div>
        </div>
    </form>
    @endif

    <!-- Footer with modal for contact information and information about team -->
    @extends('layouts/contactModalLayout')
    <footer class="footer">
        <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
        <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
        <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

    </footer>
    </body>
</div>
