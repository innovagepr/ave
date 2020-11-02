{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<x-app-layout>
    {{--    <x-slot name="header">--}}
    {{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
    {{--            {{ __('Dashboard') }}--}}
    {{--        </h2>--}}
    {{--    </x-slot>--}}
    @section('title', 'Inicio')

    @section('content')

        @if(Auth::user()->role_id == 1)
            @livewire('pro-summary')
        @else
            @livewire('child-summary')
        @endif

    @endsection


</x-app-layout>

