{{-- Stop trying to control. --}}
<x-app-layout xmlns:wire="http://www.w3.org/1999/xhtml">
    <div>
    {{--    <x-slot name="header">--}}
    {{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
    {{--            {{ __('Dashboard') }}--}}
    {{--        </h2>--}}
    {{--    </x-slot>--}}
    @livewireScripts
    @section('title', 'Actividades')


    {{--    <x-content>--}}
    @section('content')
        <div>
            <div class="activities-info mt-6">
                <div class="flex m-auto">
                    <div class="button-area">
                        <div class="m-auto select-button">
                            <img src="{{asset('images/arrow_prev.png')}}">
                        </div>
                        <div>
                            {{__('Anterior')}}
                            {{--                        {{$prev}}--}}
                        </div>
                    </div>
                    <div class="act-square">
                        {{--                    <div class="flex">--}}


                        <div class="act-main-square">
                            <div class="m-auto center ">
                                {{--                            {{$activity}}--}}
                            </div>
                        </div>
                        <div>
                            {{__('1. Instrucciones')}}
                        </div>
                        {{--                        <div class="difficulty">--}}
                        {{--                            <button class= "button button1" >Comienza</button>--}}

                        {{--                        </div>--}}

                        {{--                    </div>--}}

                    </div>
                    <div class="button-area">
                        <div class=" m-auto select-button">
                            <img src="{{asset('images/arrow_next.png')}}">
                        </div>
                        <div>
                            {{__('Siguiente')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    </div>
</x-app-layout>
