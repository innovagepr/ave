<div>
    {{-- The whole world belongs to you --}}

    <div class="main-block-full">

        <div class="first-row">
            <x-jet-label class="m-auto">{{__('Mis Puntos')}}</x-jet-label>
            {{$pet->name}}

            <x-jet-label class="m-auto">{{__('Mis Monedas')}}</x-jet-label>
            Nivel {{$pet->level}}
        </div>

        <div class="first-row">
            <div class="column">
                <div class="dashboard-card2 big-block" style="background-color: {{$pet->background_color}}">
                    <img src="{{$pet->petType->icon_url}}">
                </div>
            </div>
            <div class="column">
                <div class="dashboard-card2 lg-block " >
                </div>
                <div class="dashboard-card2 lg-block ">
                </div>
                <div class="first-row">
                    <div>
                        d
                    </div>
                    <div>
                        d
                    </div>
                </div>
            </div>
        </div>

{{--        <div>--}}
{{--            <x-jet-label class="mt-5">{{__('Mi Nivel')}}</x-jet-label>--}}
{{--            <div class="dashboard-card lg-block ">--}}
{{--                <div class="card-content card-text- m-auto mt-3 flex flex-col">--}}
{{--                    --}}{{--                    <div class="inline-flex m-auto">--}}
{{--                    --}}{{--                        <x-jet-label class="mt-5">{{__('2')}}</x-jet-label>--}}
{{--                    <progress class="m-auto mt-4" value="60" max="100"></progress>--}}
{{--                    --}}{{--                        <x-jet-label class="mt-5">{{__('3')}}</x-jet-label>--}}
{{--                    --}}{{--                    </div>--}}
{{--                    --}}{{--                    <div class="m-auto">--}}
{{--                    {{__('Puntos para el próximo nivel: 45')}}--}}
{{--                    --}}{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div>--}}
{{--            <x-jet-label class="mt-5">{{__('Mi Mascota')}}</x-jet-label>--}}
{{--            <div class="dashboard-card lg-block">--}}
{{--                <div class="card-content card-text- m-auto mt-3 flex flex-col">--}}
{{--                    <progress class="m-auto mt-4" value="32" max="100"></progress>--}}
{{--                    {{__('Puntos para el próximo nivel de mi mascota: 45')}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <x-jet-label class="mt-5">{{__('Última Actividad')}}</x-jet-label>--}}
{{--            <div class="dashboard-card lg-block">--}}
{{--                <table class="m-auto mt-2 w-4/5">--}}
{{--                    <thead>--}}
{{--                    <th>Actividad</th>--}}
{{--                    <th>Fecha</th>--}}
{{--                    <th>Dificultad</th>--}}
{{--                    <th>Resultado</th>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td class="card-text">--}}
{{--                            {{__('Letras')}}--}}
{{--                        </td>--}}
{{--                        <td class="card-text">--}}
{{--                            {{__('10/septiembre/2020')}}--}}
{{--                        </td>--}}
{{--                        <td class="card-text">--}}
{{--                            {{__('Fácil')}}--}}
{{--                        </td>--}}
{{--                        <td class="card-text">--}}
{{--                            {{__('6/10')}}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</div>
