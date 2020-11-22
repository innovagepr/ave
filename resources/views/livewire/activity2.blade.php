{{-- The Master doesn't talk, he acts. --}}
<div>

    <!-- Modal that shows if child answers question correctly -->
    <div class="modal fade" id="modalCorrect" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <span class="text-center">{{ __('¡Bien hecho!') }}</span>
                </div>

                <div class="modal-body" style="text-align: center;">
                    <div class="mt-2">
                        {{ __('¡Acertaste!') }}
                    </div>
                    <div class="mt-4">
                        <button type="submit" data-dismiss="modal" class="button button1">
                            {{ __('Continuar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal that shows if child answers question incorrectly -->
    <div class="modal fade" id="modalIncorrect" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <span class="text-center">{{ __('¡No te desanimes!') }}</span>
                </div>

                <div class="modal-body" style="text-align: center;">
                    <div class="mt-2">
                        {{ __('La contestación correcta era ') }} {{ $key }}
                    </div>
                    <div class="mt-4">
                        <button type="submit" data-dismiss="modal" class="button button1">
                            {{ __('Continuar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal that shows at the end of the activity, showing results -->
    <div class="modal fade" id="modalResults" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <span class="text-center">{{ __('Actividad Finalizada') }}</span>
                </div>

                <div class="modal-body" style="text-align: center;">
                    <div class="mt-2">
                        {{ __('¡Lo lograste! Obtuviste una puntuación de ') }} {{ $score }}{{ __('/10.') }}
                    </div>
                    <div class="mt-4">
                        <button type="submit" data-dismiss="modal" class="button button1">
                            {{ __('Finalizar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress bar for activity -->
    <div class="main-block-ses">
        <ul class="progressbar">
            <li id="0" class="{{$step == 0 ? 'active':''}}" wire:click="goTo({{0}})"></li>
            <li id="1" class="{{$step == 1 ? 'active':''}}" wire:click="goTo({{1}})"></li>
            <li id="2" class="{{$step == 2 ? 'active':''}}" wire:click="goTo({{2}})"></li>
            <li id="3" class="{{$step == 3 ? 'active':''}}" wire:click="goTo({{3}})"></li>
            <li id="4" class="{{$step == 4 ? 'active':''}}" wire:click="goTo({{4}})"></li>
            <li id="5" class="{{$step == 5 ? 'active':''}}" wire:click="goTo({{5}})"></li>
            <li id="6" class="{{$step == 6 ? 'active':''}}" wire:click="goTo({{6}})"></li>
            <li id="7" class="{{$step == 7 ? 'active':''}}" wire:click="goTo({{7}})"></li>
            <li id="8" class="{{$step == 8 ? 'active':''}}" wire:click="goTo({{8}})"></li>
            <li id="9" class="{{$step == 9 ? 'active':''}}" wire:click="goTo({{9}})"></li>
        </ul>
    </div>

    <!-- Paragraph and possible options -->
    <div class="container mt-10" style="background-color:#FFFFFF; width: 40%; margin-top: 10%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">

        <pre>
            {{ $currentExercise->paragraph->text }}
        </pre>
    </div>
    <form style="margin-left: 42%; margin-top: 2%">
        <fieldset>
            <span>{{ __('DEBUG:') }} {{ __($option) }}</span>
            <legend> {{ __($currentExercise->question) }}</legend>
            @foreach($currentExercise->options()->get()->shuffle() as $answer)
                <div>
                    <input name = "option" type="radio" value="{{ $answer }}" style="margin-right: 1%;" wire:model="option">{{ $answer->option }}
                </div>
            @endforeach
            <div>
                @error('option') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </fieldset>
        <div style="display: flex">
            <a  class = "verify" wire:click="nextExercise()"><i class="icons1 fas fa-search"></i>{{ __('Verificar') }}</a>
        </div>
    </form>

    <!-- Event listeners to show the modals for correct/incorrect answers, and for the results of the activity -->
    <script>
        window.addEventListener('correctAnswer', event => {
            $("#modalCorrect").addClass("fade");
            $("#modalCorrect").modal('show');
        })
    </script>
    <script>
        window.addEventListener('incorrectAnswer', event => {
            $("#modalIncorrect").addClass("fade");
            $("#modalIncorrect").modal('show');
        })
    </script>
    <script>
        window.addEventListener('results', event => {
            $("#modalResults").addClass("fade");
            $("#modalResults").modal('show');
        })
    </script>
</div>

