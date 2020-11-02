{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

@php
    use App\Models\Group;
    $headersGroups = array("Nombre", "Activo");
    $groups = Group::all();
$headersStudents = array("Nombre", "Grupo", "Activo");
$students = array(array("name" => "Juanito", "group" => "Grupito 2", "active" =>1),
                    array("name" => "Laurita", "group" =>"Peleones", "active" => 1));
@endphp

<div class="flex flex-col">
    <div class="m-auto mt-7 overflow-x-auto ">
        <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8">
            <x-jet-label class="m-auto">{{__('Mis Grupos')}}</x-jet-label>
            <x-table>
                <x-slot name="head">
                    @foreach($headersGroups as $head)
                        <x-table.heading>{{$head}}</x-table.heading>
                    @endforeach
                </x-slot>
                <x-slot name="body">
                    @foreach($groups as $group)
                        <x-table.row>
                            <x-table.cell>{{$group->name}}</x-table.cell>
                            @if($group->active === 0)
                                <x-table.cell>No</x-table.cell>
                            @else
                                <x-table.cell>Sí</x-table.cell>
                            @endif
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    </div>
</div>

<div class="flex flex-col">
    <div class="m-auto mt-7 overflow-x-auto ">
        <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8">
            <x-jet-label class="m-auto">{{__('Estudiantes Registrados')}}</x-jet-label>
            <x-table>
                <x-slot name="head">
                    @foreach($headersStudents as $head)
                        <x-table.heading>{{$head}}</x-table.heading>
                    @endforeach
                </x-slot>
                <x-slot name="body">
                    @foreach($students as $s)
                        <x-table.row>
                            <x-table.cell>{{$s['name']}}</x-table.cell>
                            <x-table.cell>{{$s['group']}}</x-table.cell>
                            @if($s['active'] === 0)
                                <x-table.cell>No</x-table.cell>
                            @else
                                <x-table.cell>Sí</x-table.cell>
                            @endif
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    </div>
</div>

<div>
    <x-jet-label class="mt-5">{{__('Promedio por actividad')}}</x-jet-label>
    <div class="dashboard-card lg-block max-w-3xl m-auto">
        <table class="m-auto mt-2 w-4/5">
            <thead>
            <th>Actividad</th>
            <th>Fácil</th>
            <th>Medio</th>
            <th>Dificil</th>
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
