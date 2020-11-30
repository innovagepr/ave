{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

{{dd($user, $lists)}}

<div>
    <x-jet-label class="mt-5">{{__('Ejercicios Asignados')}}</x-jet-label>
    <div class="dashboard-card lg-block max-w-3xl m-auto">
        <table class="m-auto mt-2 w-4/5">
            <thead>
            <th>Lista</th>
            <th>Actividad</th>
            <th>Asignado por</th>
            <th>Dificultad</th>
            <th>Ejercicios</th>
            <th>Completado</th>

            </thead>
            <tbody>
            <tr>
                <td class="card-text">
                    {{__('Orden de Palabras')}}
                </td>
                <td class="card-text">
                    {{__('8/10')}}
                </td>
                <td class="card-text">
                    {{__('9/10')}}
                </td>
                <td class="card-text">
                    {{__('6/10')}}
                </td>
            </tr>
            <tr>
                <td class="card-text">
                    {{__('Lectura')}}
                </td>
                <td class="card-text">
                    {{__('8/10')}}
                </td>
                <td class="card-text">
                    {{__('9/10')}}
                </td>
                <td class="card-text">
                    {{__('6/10')}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
