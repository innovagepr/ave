{{-- In work, do what you enjoy. --}}

<nav id="top-bar" class="topbar-border navbar navbar-expand-lg navbar-light bg-menu sidebar-border">
    @guest
        <a class="menu-item" href="/homepage">
            <span class="fa fa-home fa-2x"></span>
        </a>
    @endguest
    @auth
        <button class="menu-item" id="menu-toggle-top">
            <span class="pr-2 menu-burger fas fa-bars"></span>
            {{ __('Menú') }}
        </button>
    @endauth
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @auth
                @if($user->role->slug == 'professional')
                    @foreach($optionsAdult as $item => $values)
                        <div class="menu-item space-x-0 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route($values[1]) }}" :active="request()->routeIs('{{$values[1]}}')">
                                <span class="pr-1 fas fa-{{$values[2]}}"></span>
                                {{$values[0]}}
                            </x-jet-nav-link>
                        </div>
                    @endforeach
                @else
                    @foreach($optionsChild as $item => $values)
                        <div class="menu-item  space-x-0 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route($values[1]) }}" :active="request()->routeIs('{{$values[1]}}')">
                                <span class="pr-1 fas fa-{{$values[2]}}"></span>
                                {{$values[0]}}
                            </x-jet-nav-link>
                        </div>
                    @endforeach
                @endif
            @endauth
            @guest
                <div class="menu-item  space-x-0 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('login') }}">
                        <span class="pr-1 fas fa-sign-in-alt "></span>
                        {{__('Incia Sesión')}}
                    </x-jet-nav-link>
                </div>
                <div class="menu-item  space-x-0 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('register') }}">
                        <span class="pr-1 fas fa-user-circle"></span>
                        {{__('Crear Cuenta')}}
                    </x-jet-nav-link>
                </div>
            @endguest
        </ul>

    </div>
</nav>
