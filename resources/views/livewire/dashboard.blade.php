{{-- Close your eyes. Count to one. That is how long forever feels. --}}



<x-app-layout>

    @section('title', 'Inicio')

    @section('content')
        <div id="main-content">
            @if(auth()->user()->pet()->first() === null && auth()->user()->role->slug === 'child')
                <script>
                    location.replace("/seleccionar-mascota")
                </script>
            @elseif(auth()->user()->role->slug == 'professional')
                @livewire('pro-summary')
            @else
                @livewire('child-summary')
            @endif
        </div>

    @endsection

    @extends('layouts/contactModalLayout')

</x-app-layout>

