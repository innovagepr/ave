
<div class="row main-block-normal">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

<div class="column left">
    <div lass="container mb-4" style="background-color:#FFFFFF; margin-top: 5%; margin-bottom: 5%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
        <fieldset>
            <legend> {{ __("Estadísticas por:") }}</legend>
            <div>
                <div>
                    <input name = "option" type="radio" value="Grupo" wire:model="option" checked>{{ __('Grupo') }}
                </div>
                <div>
                    <input name = "option" type="radio" value="Estudiante" wire:model="option">{{ __('Estudiante') }}
                </div>

            </div>
            <div>
            </div>
        </fieldset>
    </div>

    <div lass="container mt-10" style="background-color:#FFFFFF; margin-bottom: 2%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">

        <div class="mt-0">
            <x-jet-label for="filter" value="{{ __('Seleccione') }} {{ $option }}{{ __(':') }}" style="display: block; font-size: 1.2rem; font-weight: normal; color: #050404;" />

                @if($option === 'Grupo')
                <select id="group" name="filterGroup" wire:model="groupFilter">
                @foreach($groups as $l)
                    <option value="{{ $l->id }}">{{ $l->name }}</option>
                @endforeach
                </select>
                    @elseif($option === 'Estudiante')
                        <select id="group" name="filterStudent" wire:model="studentFilter">
                    @foreach($students as $l)
                        <option value="{{ $l->id }}">{{ $l->fullname }}</option>
                    @endforeach
                        </select>
                    @endif
        </div>
        @if($option === 'Grupo')
        <div class="mt-0">
            <div>{{ __('Total de Miembros Activos: ') }} {{ count($activeMembers) }}</div>
            <div>{{ __('Total de Participantes: ') }} {{ count($totalParticipants) }}</div>
        </div>
            @endif
    </div>
</div>
<div class="column right">
@if($option === 'Estudiante')
        <div class="container mt-10" style="background-color:#FFFFFF; margin-top: 5%; margin-bottom: 5%; width: 80%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
            {{ __('Desempeño por Actividad:') }}
            <select id="group" name="filterActivity" wire:model="activityFilter">
                @foreach($activities as $l)
                    <option value="{{ $l->name }}">{{ $l->name }}</option>
                @endforeach
            </select>
        </div>

    <div class="container" >
        @if($activityFilter === 'Lectura' && $option === 'Estudiante')

            <div>
            @if($readingMax)
                    <i class="fas fa-book-reader inline-block" style="color:#2576AC; float: left; margin-left: 10%"></i>
                    <x-jet-label for="statsReading" class="inline-block" style="float: left;" value="{{ __('Lectura') }}"/>
                <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8">
                    <x-table>
                        <x-slot name="head">
                                <x-table.heading>{{ __('Tipo de puntuación') }}</x-table.heading>
                            <x-table.heading>{{ __('Puntuación') }}</x-table.heading>
                        </x-slot>
                        <x-slot name="body">
                                <x-table.row>
                                    <x-table.cell> {{ __('Máxima') }}</x-table.cell>
                                    <x-table.cell> {{ __($readingMax) }}{{ __('/10') }}</x-table.cell>
                                </x-table.row>
                            <x-table.row>
                                <x-table.cell> {{ __('Mínima') }}</x-table.cell>
                                <x-table.cell> {{ __($readingMin) }}{{ __('/10') }}</x-table.cell>
                            </x-table.row>
                            <x-table.row>
                                <x-table.cell> {{ __('Promedio') }}</x-table.cell>
                                <x-table.cell> {{ __($readingAvg) }}{{ __('/10') }}</x-table.cell>
                            </x-table.row>
                        </x-slot>
                    </x-table>
                </div>
            @else
                </div>
            <div>
                <div class="container mt-10" style="background-color:#FFFFFF; margin-top: 5%; margin-bottom: 5%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
                    <span> {{ __('No hay récords disponibles al momento.') }} </span>
                </div>
            </div>
            @endif

        @elseif($activityFilter === 'Palabras' && $option === 'Estudiante')

            <div>
            @if($wordMax)
                    <i class="fas fa-pencil-ruler" style="color:#2576AC; float: left; margin-left: 10%"></i>
                    <x-jet-label for="statsWords" class="inline-block" style="float: left;" value="{{ __('Palabras') }}"/>
                <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8">
                    <x-table>
                        <x-slot name="head">
                            <x-table.heading>{{ __('Tipo de puntuación') }}</x-table.heading>
                            <x-table.heading>{{ __('Puntuación') }}</x-table.heading>
                        </x-slot>
                        <x-slot name="body">
                            <x-table.row>
                                <x-table.cell> {{ __('Máxima') }}</x-table.cell>
                                <x-table.cell> {{ __($wordMax) }}{{ __('/10') }}</x-table.cell>
                            </x-table.row>
                            <x-table.row>
                                <x-table.cell> {{ __('Mínima') }}</x-table.cell>
                                <x-table.cell> {{ __($wordMin) }}{{ __('/10') }}</x-table.cell>
                            </x-table.row>
                            <x-table.row>
                                <x-table.cell> {{ __('Promedio') }}</x-table.cell>
                                <x-table.cell> {{ __($wordAvg) }}{{ __('/10') }}</x-table.cell>
                            </x-table.row>
                        </x-slot>
                    </x-table>
                </div>
            @else
                    <div class="container mt-10" style="background-color:#FFFFFF; margin-top: 5%; margin-bottom: 5%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
                        <span> {{ __('No hay récords disponibles al momento.') }} </span>
                    </div>
            @endif
            </div>
            @endif
    </div>
</div>
    <div class="column">
@elseif($option === 'Grupo' && $groupFilter)
        <div class="container">
            @livewire('group-statistics', ['selectedGroup' => $groupFilter])
        </div>

    @endif
    </div>


</div>
