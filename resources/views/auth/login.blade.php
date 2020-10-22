<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" class="inline-flex" value="{{ __('Email:') }}" />
                <x-jet-input id="email" class="mt-2 w-3/4 inline-flex justify-center" type="email" name="email" placeholder="Escriba su correo electrónico" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="inline-flex" value="{{ __('Contraseña:') }}" />
                <x-jet-input id="password" class="mt-2 w-3/4 inline-flex justify-center" type="password" name="password" placeholder="Escriba su contraseña" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar usuario') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Iniciar sesión') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidó su contraseña?') }}
                    </a>
                @endif
            </div>
            <div><hr class="mt-4"></div>
        <div class="flex items-center justify-center mt-4">
            <a>
                {{ __('¿No tiene cuenta aún?') }}
            </a>
        </div>
        </form>
        <form method="GET" action="{{ route('register') }}">
            @csrf
        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="ml-4">
                {{ __('Crear Cuenta') }}
            </x-jet-button>
        </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
