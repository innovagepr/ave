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
            <x-jet-label for="difficulty" value="{{ __('Seleccione') }} {{ $option }}{{ __(':') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
            <select id="group" name="filter" wire:model="filter">
                @if($option === 'Grupo')
                @foreach($groups as $l)
                    <option value="{{ $l['id'] }}">{{ $l['name'] }}</option>
                @endforeach
                    @elseif($option === 'Estudiante')
                    @foreach($students as $l)
                        <option value="{{ $l['id'] }}">{{ $l['name'] }}</option>
                    @endforeach
                @else
                    @foreach($activities as $l)
                        <option value="{{ $l['id'] }}">{{ $l['name'] }}</option>
                    @endforeach
                    @endif

            </select>
            <div>{{ __('DEBUG') }} {{ $filter }}</div>
        </div>
        @if($option === 'Grupo')
        <div class="mt-0">
            <div>{{ __('Total de Miembros Activos: ') }} {{ $activeMembers[$filter]['numberActive'] }}</div>
            <div>{{ __('Total de Participantes: ') }} {{ $totalParticipants[$filter]['total'] }}</div>
        </div>
            @endif
    </div>

    <div class="container" style="float: inside; text-align: right;">
        {{ __('Desempeño por Actividad:') }}
        <div>
            <x-jet-label for="difficulty" value="{{ __('Nivel de Dificultad:') }}" />
            <select id="difficulty" name="difficulty" wire:model="difficulty">
                <option value="Fácil">{{ __('Fácil') }}</option>
                <option value="Medio">{{ __('Medio') }}</option>
                <option value="Difícil">{{ __('Difícil') }}</option>
            </select>
        </div>

    </div>




</div>
