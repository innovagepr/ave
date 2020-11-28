<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="container">
        <fieldset>
            <legend> {{ __("Estadísticas por:") }}</legend>
            <div>
                <div>
                    <input name = "option" type="radio" value="Grupo" wire:model="option" checked>{{ __('Grupo') }}
                </div>
                <div>
                    <input name = "option" type="radio" value="Estudiante" wire:model="option">{{ __('Estudiante') }}
                </div>
                <div>
                    <input name = "option" type="radio" value="Actividad" wire:model="option">{{ __('Actividad') }}
                </div>

            </div>
            <div>
            </div>
        </fieldset>
    </div>

    <div class="container">

        <div class="mt-0">
            <x-jet-label for="filter" value="{{ __('Seleccione') }} {{ $option }}{{ __(':') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />

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
                @else
                            <select id="group" name="filterActivity" wire:model="activityFilter">
                    @foreach($activities as $l)
                        <option value="{{ $l->id }}">{{ $l->name }}</option>
                    @endforeach
                            </select>
                    @endif


            <div>{{ __('DEBUG') }} {{ $filter }}</div>
        </div>
        @if($option === 'Grupo')
        <div class="mt-0">
            <div>{{ __('Total de Miembros Activos: ') }} {{ count($activeMembers) }}</div>
            <div>{{ __('Total de Participantes: ') }} {{ count($totalParticipants) }}</div>
        </div>
            @endif
    </div>


@if($option === 'Estudiante')
        <div class="container" style="float: inside; text-align: right;">
            {{ __('Desempeño por Actividad:') }}
        </div>
    <div class="container" style="float: inside; text-align: right;">
        <div>
            <i class="fas fa-book-reader"></i>
            <x-jet-label for="statsReading" class="inline-block" value="{{ __('Lectura') }}"/>
            @if($readingMax)
                <div>
                    <span>{{ __('Puntuación Máxima: ') }} {{ __($readingMax) }}{{ __('/10') }}</span>
                </div>
                <div>
                    <span>{{ __('Puntuación Mínima: ') }} {{ __($readingMin) }}{{ __('/10') }}</span>
                </div>
                <div>
                    <span>{{ __('Puntuación Promedio: ') }} {{ __($readingAvg) }}{{ __('/10') }}</span>
                </div>

            @else
            <div>
                <span> {{ __('No hay récords disponibles al momento.') }} </span>
            </div>
            @endif
        </div>
        <div>
            <i class="fas fa-pencil-ruler"></i>
            <x-jet-label for="statsWords" class="inline-block" value="{{ __('Palabras') }}"/>
            @if($wordMax)
                <div>
                    <span>{{ __('Puntuación Máxima: ') }} {{ __($wordMax) }}{{ __('/10') }}</span>
                </div>
                <div>
                    <span>{{ __('Puntuación Mínima: ') }} {{ __($wordMin) }}{{ __('/10') }}</span>
                </div>
                <div>
                    <span>{{ __('Puntuación Promedio: ') }} {{ __($wordAvg) }}{{ __('/10') }}</span>
                </div>

            @else
                <div>
                    <span> {{ __('No hay récords disponibles al momento.') }} </span>
                </div>
            @endif
        </div>

    </div>
@elseif($option === 'Grupo' && $groupFilter)
        <div class="container" style="float: inside; text-align: right;">
            @livewire('group-statistics', ['selectedGroup' => $groupFilter])
        </div>

    @endif



</div>
