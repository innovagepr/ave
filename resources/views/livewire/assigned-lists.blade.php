{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}


<div>
    <x-jet-label class="mt-5">{{__('Ejercicios Asignados')}}</x-jet-label>
    <div class="dashboard-card lg-block max-w-3xl m-auto">
        <table class="m-auto mt-2 w-4/5">
            <thead>
            <th>Lista</th>
            <th>Actividad</th>
            <th>Asignado por</th>
            <th>Dificultad</th>
            <th>Cantidad de Ejercicios</th>
            <th>Completado</th>

            </thead>
            <tbody>
            @foreach($lists as $l)
                <tr>
                    <td class="m-auto" wire:click="activityList({{$l->id}}, {{$l->activity()->first()->id}})">
                        {{$l->name}}
                    </td>
                    <td class="m-auto">
                        {{$l->activity()->first()->name}}
                    </td>
                    <td class="m-auto">
                        {{$l->owner()->first()->fullName}}
                    </td>
                    <td class="m-auto">
                        {{$l->difficulty()->first()->name}}
                    </td>
                    <td class="m-auto">
                        {{__('10')}}
                    </td>
                    <td class="m-auto">
                        @if(\App\Models\CompletedActivity::find($l->id))
                            {{__('Sí')}}
                        @else
                            {{__('No')}}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
