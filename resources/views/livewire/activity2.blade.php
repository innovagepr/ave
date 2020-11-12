{{-- The Master doesn't talk, he acts. --}}
<div>
    <!-- Custom styling for progress bar -->
    <style>
        .container1 {
            width: 600px;
            margin: 100px auto;
        }
        .progressbar {
            counter-reset: step;
        }
        .progressbar li {
            list-style-type: none;
            width: 10%;
            float: left;
            font-size: 12px;
            position: relative;
            text-align: center;
            text-transform: uppercase;
            color: #7d7d7d;
        }
        .progressbar li:before {
            width: 30px;
            height: 30px;
            content: counter(step);
            counter-increment: step;
            line-height: 30px;
            border: 3px solid #7d7d7d;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }
        .progressbar li:after {
            width: 100%;
            height: 4px;
            content: '';
            position: absolute;
            background-color: #7d7d7d;
            top: 15px;
            left: -50%;
            z-index: -1;
        }
        .progressbar li:first-child:after {
            content: none;
        }
        .progressbar li.active {
            color: green;
        }
        .progressbar li.active:before {
            border-color: #55b776;
        }
        .progressbar li.active + li:after {
            background-color: #55b776;
        }
        .iconAudio{
            font-size: 40px;
        }
        .a {
            display: inline-block;
            position: relative;
            margin: 1%;
            float: left;
            width: 70px;
            height: 70px;
            background-color: white;
            border: 4px solid #2576AC;
            text-align: center;
            font-family: "Berlin Sans FB";
            font-size: 45px;
            vertical-align: center;
        }
        .b {
            display: inline-block;
            position: relative;
            margin: 1%;
            float: left;
            width: 60px;
            height: 60px;
            background-color: white;
            border: 4px solid #2576AC;
            text-align: center;
            font-family: "Berlin Sans FB";
            font-size: 45px;
            vertical-align: center;
            cursor: pointer;
        }
        .b:hover{
            background-color: lightskyblue;
        }
    </style>

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
            <li id="0" class="{{$step == 0 ? 'active':''}}"></li>
            <li id="1" class="{{$step == 1 ? 'active':''}}"></li>
            <li id="2" class="{{$step == 2 ? 'active':''}}"></li>
            <li id="3" class="{{$step == 3 ? 'active':''}}"></li>
            <li id="4" class="{{$step == 4 ? 'active':''}}"></li>
            <li id="5" class="{{$step == 5 ? 'active':''}}"></li>
            <li id="6" class="{{$step == 6 ? 'active':''}}"></li>
            <li id="7" class="{{$step == 7 ? 'active':''}}"></li>
            <li id="8" class="{{$step == 8 ? 'active':''}}"></li>
            <li id="9" class="{{$step == 9 ? 'active':''}}"></li>
        </ul>
    </div>

    <!-- Paragraph and possible options -->
    <div class="container mt-10" style="background-color:#FFFFFF; width: 40%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">

        <p>
            {{ $exercises[$step]['Paragraph'] }}
        </p>
    </div>
    <form>
        <fieldset>
            <legend> {{ __("Escoge la opción correcta:") }}</legend>
            @foreach($answers[$step]['options'] as $answer)
                <div>
                    <input name = "option" type="radio" value="{{ $answer }}" wire:model="option">{{ $answer }}
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

