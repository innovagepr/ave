<x-app-layout>
    {{--    <x-slot name="header">--}}
    {{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
    {{--            {{ __('Dashboard') }}--}}
    {{--        </h2>--}}
    {{--    </x-slot>--}}
    @section('title', 'Inicio')

    @section('content')
        @if(true)
            @livewire('pro-summary')

        @else
            {{--            <div class="py-12">--}}
            {{--                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
            {{--                    <div class="overflow-hidden sm:rounded-lg">--}}
            {{--                                            <x-jet-welcome />--}}
            <h2>Hello</h2>
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        @endif
    @endsection


</x-app-layout>
