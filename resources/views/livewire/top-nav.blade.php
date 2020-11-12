{{-- In work, do what you enjoy. --}}

<nav id="top-bar" class="navbar navbar-expand-lg navbar-light bg-menu sidebar-border">
    <button class="menu-item" id="menu-toggle-top">
        <span class="pr-2 menu-burger fas fa-bars"></span>
        {{ __('Menú') }}
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if(Auth::user()->role_id == 1)
                @foreach($optionsAdult as $item => $values)
                    <div class="menu-item  space-x-0 sm:-my-px sm:ml-10 sm:flex">
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

        </ul>

    </div>
</nav>
