{{-- If your happiness depends on money, you will never be happy with yourself. --}}

<div class="main-block-normal mt-7">

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
        <x-jet-label class="mt-3">{{__('Mi Nivel')}}</x-jet-label>
        <div class="dashboard-card lg-block ">
            <div class="card-content card-text m-auto pt-3 flex flex-col">
                <div class="flex flex-row">
                    <div class="text-right level">
                        {{$level}}
                    </div>
                    <progress class="m-auto mt-4" value="{{$points}}" max="20"></progress>
                    <div class="text-left level">
                        {{$level+1}}
                    </div>
                </div>
                {{__('Puntos para el próximo nivel: '.$nextPoints)}}

            </div>
        </div>

    </div>

    <div>
        <x-jet-label class="mt-3">{{__('Mi Mascota')}}</x-jet-label>
        <div class="dashboard-card lg-block">
            <div class="card-content card-text m-auto pt-3 flex flex-col">
                <div class="flex">
                    <div class="text-right level">

                    {{$level}}
                    </div>
                    <progress class="m-auto mt-4" value="{{$petPoints}}" max="10"></progress>
                    <div class="text-right level">

                    {{$level+1}}
                    </div>
                </div>
                {{__('Puntos para el próximo nivel de mi mascota: '.$nextPetPoints)}}

            </div>
        </div>
    </div>
    @if($lastActivity)
    <div>
        <x-jet-label class="mt-3">{{__('Última Actividad')}}</x-jet-label>
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
                        {{__($lastActivity)}}
                    </td>
                    {{--<td class="card-text">
                        {{__($lastActivity->created_at)}}
                    </td>
                    <td class="card-text">
                        {{__($lastActivityDifficulty)}}
                    </td>
                    <td class="card-text">
                        {{__($lastActivity->final_score)}}{{__('/10')}}
                    </td>--}}
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endif
</div>
