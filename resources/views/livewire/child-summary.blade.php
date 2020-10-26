{{-- If your happiness depends on money, you will never be happy with yourself. --}}
{{--@extends('dashboard')--}}

@section('title', 'Inicio')

@section('content')

    <div class="{{$marginLeft}} mt-7">

        <div class="first-row">
            <x-jet-label class="m-auto">{{__('Mis Puntos')}}</x-jet-label>

            <x-jet-label class="m-auto">{{__('Mis Monedas')}}</x-jet-label>
        </div>

        <div class="first-row">

            <div class="dashboard-card sm-block points">
                <div class="card-content card-text m-auto mt-2">
                    <span class="fas fa-trophy"></span>
                    {{$points}}
                </div>
            </div>

            <div class="dashboard-card sm-block coins">
                <div class="card-content card-text m-auto mt-2">
                    <span class="fas fa-coins"></span>
                    {{$coins}}
                </div>
            </div>
        </div>

        <div>
            <x-jet-label class="mt-5">{{__('Mi Nivel')}}</x-jet-label>
            <div class="dashboard-card lg-block ">
                <div class="card-content card-text- m-auto mt-3 flex flex-col">
{{--                    <div class="inline-flex m-auto">--}}
{{--                        <x-jet-label class="mt-5">{{__('2')}}</x-jet-label>--}}
                        <progress class="m-auto mt-4" value="60" max="100"></progress>
{{--                        <x-jet-label class="mt-5">{{__('3')}}</x-jet-label>--}}
{{--                    </div>--}}
{{--                    <div class="m-auto">--}}
                        {{__('Puntos para el próximo nivel: 45')}}
{{--                    </div>--}}
                </div>
            </div>

        </div>

        <div>
            <x-jet-label class="mt-5">{{__('Mi Mascota')}}</x-jet-label>
            <div class="dashboard-card lg-block">
                <div class="card-content card-text- m-auto mt-3 flex flex-col">
                    <progress class="m-auto mt-4" value="32" max="100"></progress>
                    {{__('Puntos para el próximo nivel de mi mascota: 45')}}
                </div>
            </div>
        </div>

        <div>
            <x-jet-label class="mt-5">{{__('Última Actividad')}}</x-jet-label>
            <div class="dashboard-card lg-block">
                <table class="m-auto mt-2 w-4/5">
                    <thead>
                    <th>Actividad</th>
                    <th>Fecha</th>
                    <th>Dificultad</th>
                    <th>Resultado</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="card-text">
                            {{__('Letras')}}
                        </td>
                        <td class="card-text">
                            {{__('10/septiembre/2020')}}
                        </td>
                        <td class="card-text">
                            {{__('Fácil')}}
                        </td>
                        <td class="card-text">
                            {{__('6/10')}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
