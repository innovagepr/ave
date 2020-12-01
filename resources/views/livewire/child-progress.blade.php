<div>
    {{-- Be like water. --}}
    <div class="block">
        <x-jet-label class="block" style="text-align: center; margin-top: 5%" value="{{ __('Actividades Realizadas Reciéntemente') }}"/>

        <div class="container mb-4" style="background-color:#FFFFFF; margin-bottom: 5%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
            <table class="m-auto mt-2 w-4/5">
                <thead>
                <th>Actividad</th>
                <th>Lista</th>
                <th>Fecha</th>
                <th>Dificultad</th>
                <th>Resultado</th>
                </thead>
                <tbody>
                @foreach($recentActivities as $a)
                <tr>
                    <td class="card-text">
                        {{__(\App\Http\Livewire\ChildProgress::getActivityName($a->activity_id))}}
                    </td>
                    <td class="card-text">
                        {{__(\App\Http\Livewire\ChildProgress::getListName($a->list_id))}}
                    </td>
                    <td class="card-text">
                        {{__($a->created_at->format('Y-m-d'))}}
                    </td>
                    <td class="card-text">
                        {{__(\App\Http\Livewire\ChildProgress::getDifficulty($a->difficulty_id))}}
                    </td>
                    <td class="card-text">
                        {{__($a->final_score)}}{{__('/10')}}
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class="container mb-4" style="background-color:#FFFFFF; margin-bottom: 5%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">
            <div>
                <span>{{__('Total de actividades realizados: ')}}{{__($totalExercises)}}</span>
            </div>
            <div>
                <span>{{__('Total de actividades de palabras realizados: ')}}{{__($totalWordExercises)}}</span>
            </div>
            <div>
                <span>{{__('Total de actividades de lectura realizados: ')}}{{__($totalReadingExercises)}}</span>
            </div>
        </div>
            <div class="container">
                <x-jet-label class="m-auto block">{{ __('Promedios por actividad') }}</x-jet-label>
                <div id="stocks-chart"></div>
                <?= Lava::render('BarChart', 'MyStocks', 'stocks-chart'); ?>

            </div>
    </div>
    <script>
        window.google.charts.load('46', {packages: ['corechart']});
    </script>
</div>
