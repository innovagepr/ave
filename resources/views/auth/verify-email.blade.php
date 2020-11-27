<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">

<div class="container-fluid mt-4" style="background-color:#FFFFFF; margin-top: 10%; margin-left: 20%; width: 60%; font-size: 2rem; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
    <div class="mb-4 text-sm items-center justify-center text-gray-600">
        {{ __('Para utilizar su cuenta, confirme la misma a través del enlace enviado a su correo electrónico.
                De no recibirlo, presione el botón de reenviar.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4" style="color: green">
            {{ __('Se ha enviado el enlace de confirmación a su correo electrónico.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="button button1">
                    {{ __('Enviar enlace de confirmación') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="button button1">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</div>
</body>
