{{-- Because she competes with no one, no one can compete with her. --}}

<div class="bg-menu sidebar-border" id="sidebar-wrapper" >
    <div class="sidebar-heading">
        <button class="menu-item" id="menu-toggle" >
            <span class="pr-2 menu-burger fas fa-bars"></span>
            {{ __('Menú') }}
        </button>
    </div>

    <div class="flex items-center px-4">
        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        </div>

        <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ __('Nivel 3')}}</div>

            {{--                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
        </div>
    </div>

    <div class="flex items-center px-4">
        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        </div>

        <div class="ml-3">
            <div class="font-large text-base text-gray-800">{{ __('Max')}}</div>
            <div class="font-medium text-sm text-gray-500">{{ __('Puppy')}}</div>

            {{--                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
        </div>
    </div>

    <div class="flex items-center px-4">
        <button class="menu-item" id="menu-toggle">
            <span class="pr-2 menu-burger fas fa-cog"></span>
            {{ __('Configurar mi Perfil') }}
        </button>
    </div>



    <div class="line"></div>

    <div class="menu-bar menu-bar-flush">
        @if(Auth::user()->role_id == 1)
            @foreach($optionsAdult as $item => $values)
                <div class="menu-item menu-item-action bg-menu">
                    <x-jet-nav-link href="{{ route($values[1]) }}" :active="request()->routeIs('{{$values[1]}}')">
                        <span class="pr-1 fas fa-{{$values[2]}}"></span>
                        {{$values[0]}}
                    </x-jet-nav-link>
                </div>
            @endforeach
        @else
            @foreach($optionsChild as $item => $values)
                <div class="menu-item menu-item-action bg-menu">
                    <x-jet-nav-link href="{{ route($values[1]) }}" :active="request()->routeIs('{{$values[1]}}')">
                        <span class="pr-1 fas fa-{{$values[2]}}"></span>
                        {{$values[0]}}
                    </x-jet-nav-link>
                </div>
            @endforeach
        @endif
    </div>

    <div class="sidebar-footer">
        <div class="flex items-center px-4">
            <button class="menu-item" id="menu-toggle">
                <span class="pr-2 menu-burger fas fa-sign-out-alt"></span>
                {{ __('Cerrar Sesión') }}
            </button>
        </div>
        <div class="line"></div>
        <button class="menu-item" id="menu-toggle">
            <span class="pr-2 menu-burger fas fa-phone"></span>
            {{ __('Contáctanos') }}
        </button>
    </div>
</div>







