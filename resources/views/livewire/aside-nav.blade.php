{{-- Because she competes with no one, no one can compete with her. --}}

<div class="bg-menu sidebar-border" id="sidebar-wrapper" >
    <div class="sidebar-heading">
        <button class="menu-item" id="menu-toggle" >
            <span class="pr-2 menu-burger fas fa-bars"></span>
            {{ __('Menú') }}
        </button>
    </div>

    <div class="flex items-center pl-2">
        <div class="flex-shrink-0">
            <img class="h-13 w-13 rounded-full" src="{{asset($user->icon)}}"/>
        </div>

        <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ $user->fullName }}</div>
            @if($user->role->slug == 'child')
                <div class="font-medium text-sm text-gray-500">{{'Nivel '.$user->level}}</div>
            @endif
        </div>
    </div>

    @if($pet)
        <div class="flex items-center pl-2 pt-2">
            <div class="flex-shrink-0">
                <img class="h-13 w-13 rounded-full" src="{{$pet->petType->icon_url}}" />
            </div>

            <div class="ml-3">
                <div class="font-large text-base text-gray-800">{{$pet->name}}</div>
                <div class="font-medium text-sm text-gray-500">{{'Nivel '.$pet->level}}</div>
            </div>
        </div>
    @endif

    <div class="flex items-center pl-2 pt-2">
        <button class="menu-item" wire:click="editProfile">
            <span class="menu-burger fas fa-cog"></span>
            {{ __('Configurar mi Perfil') }}
        </button>
    </div>

    <div class="line mb-3"></div>

    <div class="menu-bar menu-bar-flush">
        @if($user->role->slug == 'professional')
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

    <footer class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="flex items-center">
                <button class="menu-item" wire:click="">
                    <span class="pr-2 menu-burger fas fa-sign-out-alt"></span>
                    {{ __('Cerrar Sesión') }}
                </button>
            </div>
        </form>
        <div class="line" style="width: 15rem;"></div>
        <div class="flex items-center">

            <button class="menu-item" id="menu-toggle" data-toggle="modal" data-target="#modalForm">
                <span class="pr-2 menu-burger fas fa-phone"></span>
                {{ __('Contáctanos') }}
            </button>
            <img class="ml-8" style="width:28px; height:28px" src="{{asset('images/roundInnovAGElogo.png')}}">
        </div>

    </footer>
    @extends('layouts/contactModalLayout')

</div>







