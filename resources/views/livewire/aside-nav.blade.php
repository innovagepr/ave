{{-- Because she competes with no one, no one can compete with her. --}}


<div class="{{$displayAside}}"  xmlns:wire="http://www.w3.org/1999/xhtml">
<!-- Sidebar  -->
{{--<nav x-data="{ open: false }" class="menu-top-border bg-menu " >--}}
<nav id="sidebar" class=" bg-menu menu-top-border"  xmlns:wire="http://www.w3.org/1999/xhtml">
    {{--        <div class="sidebar-header">--}}
    {{--            <h3>Dacor Sidebar</h3>--}}
    {{--        </div>--}}

    <div class="menu-item hidden  sm:my-2 sm:ml-7 sm:flex">
        <button class="menu-item" wire:click="hideAside">
            <span class="pr-2 menu-burger fas fa-bars fa-2x"></span>
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

    <div class="line"></div>

    <div class="aside-menu">
        <div class="aside-menu-item hidden space-x-0 sm:-my-px sm:ml-1 sm:flex">
            <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                <span class="pr-1 fas fa-book"></span>
                {{ __('Actividades') }}
                {{--                        {{$option}}--}}
            </x-jet-nav-link>
        </div>
        <div class="aside-menu-item hidden space-x-0 sm:-my-px sm:ml-1 sm:flex">
            <span class="pr-1 fas fa-paw"></span>
            <x-jet-nav-link href="" >
                {{ __('Mi Mascota') }}
            </x-jet-nav-link>
        </div>
        <div class="aside-menu-item hidden space-x-0 sm:-my-px sm:ml-10 sm:flex">
            <span class="pr-1 fas fa-store-alt"></span>
            <x-jet-nav-link href="">
                {{ __('Tienda') }}
            </x-jet-nav-link>
        </div>
        <div class="aside-menu-item hidden space-x-0 sm:-my-px sm:ml-1 sm:flex">
            <span class="pr-1 fas fa-chart-bar"></span>
            <x-jet-nav-link href="">
                {{ __('Mi Progreso') }}
            </x-jet-nav-link>
        </div>
    </div>

</nav>

</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>







