{{-- The Master doesn't talk, he acts. --}}
<div>
    <!-- Modal that shows if child answers question correctly -->
    <div class="modal fade" id="modalCorrect" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;" >¡Bien Hecho!</h1>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">Contestaste la pregunta correctamente.</h1>
                </div>
                <div class="modal-body" style="text-align: center;">
                    @if(auth()->user())
                        <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/satisfaction.png')}}"> +2 puntos</p>
                        <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/savings.png')}}"> +5 monedas</p>
                    @endif
                </div>
                <div class="mt-4" style="text-align: center;">
                    <button type="submit" data-dismiss="modal" class="button button1">
                        {{ __('Continuar') }}
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal that shows if child answers question incorrectly -->
    <div class="modal fade" id="modalIncorrect" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
                <div>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡No te desanimes! La próxima vez te irá mejor.</h1>
                </div>

                <div class="modal-body" style="text-align: center;">
                    <table style="text-align: center; font-family: 'Berlin Sans FB'; font-size: 25px; width:100%; border: 2px solid red; margin: 5px;">
                        <tr>
                            <th style="font-weight: lighter; text-align: center; color: #2576AC">Tu Respuesta  | </th>
                            <th style="font-weight: lighter; text-align: center; color: #2576AC">Respuesta Correcta </th>
                        </tr>
                        <tr>
                            <td>
                                {{$incorrectAnswer}}
                            </td>
                            <td style="color: #19D519">
                                {{$correctAnswer}}
                            </td>
                        </tr>
                    </table>
                    <div class="mt-4">
                        <button type="submit" data-dismiss="modal" class="button button1">
                            {{ __('Continuar') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalQuit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">

                <div style="margin: 5px; text-align: center;">
                    <i class="fas fa-exclamation-triangle" style = "font-size: 30px; color: red"></i>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 30px; color: #2576AC; text-align: center; margin: 5px;" >¿Estás seguro que quieres someter tus ejercicios?</h1>
                </div>
                <form autocomplete="off">

                    <p style ="font-family: 'Berlin Sans FB'; font-size: 20px; color: #2576AC; text-align: center;" >Tienes <span style="color: red; font-size: 25px">{{$remainingExercises}}/10 </span> ejercicios contestados.</p>
                    <div class="modal-footer" style="margin:auto;">
                        <a type="button" class="button3 button1" style="font-size: 20px; margin: 0 auto" wire:click="submitExercises()" data-dismiss="modal">Someter</a>
                        <button type="button" class="button3 button1 " style="font-size: 20px; margin: 0 auto" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal that shows at the end of the activity, showing results -->
    <div class="modal fade" id="modalResults" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" style="margin-top: 13%">
            <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
                <div>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡Bien Hecho!</h1>
                    <h2 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">Lograste acertar <span style="color: #19D519">{{$score}}/10</span> preguntas.</h2>
                </div>
                <form autocomplete="off">
                    <div class="modal-body" style="text-align: center">
                        <h2 style ="font-family: Berlin Sans FB; font-size: 25px; color: #2576AC; text-align: center; margin: 5px;">Solo te equivocaste en <span style="color: red">{{10 -( $score)}}</span> ejericios:</h2>
                        <table style="text-align: center; font-family: 'Berlin Sans FB'; font-size: 25px; width:100%; border: 2px solid red">
                            <tr>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Ejercicio</th>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Tu Respuesta</th>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Respuesta Correcta</th>
                            </tr>
                            @foreach($badAnswers as $incorrect)
                                <tr>
                                    <td>
                                        {{$incorrect[0]}}
                                    </td>
                                    <td style="color: red">
                                        {{$incorrect[1]}}
                                    </td>
                                    <td style="color: #19D519">
                                        {{$incorrect[2]}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="modal-footer" style="margin:auto;">
                        <a type ="button" style = "text-decoration: none; font-size: 20px; margin: 0 auto" class= "button button1 button2" href="{{ route('activities') }}"> Finalizar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Progress bar for activity -->
    <div class="main-block-ses">
        <ul class="progressbar">
            @if($answeredFlag[0] === 1)
                <li id="0" class="answered"></li>
            @else
                <li id="0" class="{{$step == 0 ? 'active':''}}" wire:click="goTo({{0}})"></li>
            @endif
            @if($answeredFlag[1] === 1)
                <li id="1" class="answered"></li>
            @else
                <li id="1" class="{{$step == 1 ? 'active':''}}" wire:click="goTo({{1}})"></li>
            @endif
            @if($answeredFlag[2] === 1)
                <li id="2" class="answered"></li>
            @else
                <li id="2" class="{{$step == 2 ? 'active':''}}" wire:click="goTo({{2}})"></li>
            @endif
            @if($answeredFlag[3] === 1)
                <li id="3" class="answered"></li>
            @else
                <li id="3" class="{{$step == 3 ? 'active':''}}" wire:click="goTo({{3}})"></li>
            @endif
            @if($answeredFlag[4] === 1)
                <li id="4" class="answered"></li>
            @else
                <li id="4" class="{{$step == 4 ? 'active':''}}" wire:click="goTo({{4}})"></li>
            @endif
            @if($answeredFlag[5] === 1)
                <li id="5" class="answered"></li>
            @else
                <li id="5" class="{{$step == 5 ? 'active':''}}" wire:click="goTo({{5}})"></li>
            @endif
            @if($answeredFlag[6] === 1)
                <li id="6" class="answered"></li>
            @else
                <li id="6" class="{{$step == 6 ? 'active':''}}" wire:click="goTo({{6}})"></li>
            @endif
            @if($answeredFlag[7] === 1)
                <li id="7" class="answered"></li>
            @else
                <li id="7" class="{{$step == 7 ? 'active':''}}" wire:click="goTo({{7}})"></li>
            @endif
            @if($answeredFlag[8] === 1)
                <li id="8" class="answered"></li>
            @else
                <li id="8" class="{{$step == 8 ? 'active':''}}" wire:click="goTo({{8}})"></li>
            @endif
            @if($answeredFlag[9] === 1)
                <li id="9" class="answered"></li>
            @else
                <li id="9" class="{{$step == 9 ? 'active':''}}" wire:click="goTo({{9}})"></li>
            @endif
        </ul>
    </div>

    <!-- Paragraph and possible options -->
    <div class="container mt-10" style="background-color:#FFFFFF; margin-top: 10%; margin-bottom: 2%; width: 30%; display: block; border-style: solid; border-width: 3px; border-radius: 35px; text-align: center; border-color:#2576AC;">

        <p style=" word-wrap: break-word; margin-top: 5%; margin-bottom: 5%; text-align: center;">
            {{ $currentExercise->paragraph->text }}
        </p>
    </div>
    <form style="text-align: center; word-break: break-word;">
        <fieldset>
            <legend style="font-weight: bolder;"> {{ __($currentExercise->question) }}</legend>
            @foreach($currentExercise->options()->get()->shuffle() as $answer)
                <div>
                    <input name = "option" type="radio" value="{{ $answer->id }}" style="margin-right: 1%;" wire:model="option">{{ $answer->option }}
                </div>
            @endforeach
            <div>
                @error('option') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </fieldset>
        <div style="display: flex">
            <a  class = "verify" wire:click="nextExercise()"><i class="icons1 fas fa-search"></i>{{ __('Verificar') }}</a>
        </div>
        <div class ="bottomRight">
            <a type="button" wire:click ="quitWarning()" class="button5" style="text-decoration: none">Finalizar Actividad<span class="tooltiptext">Haz click aquí para someter la actividad.</span></a>
        </div>
    </form>

    <!-- Event listeners to show the modals for correct/incorrect answers, and for the results of the activity -->
    <script>
        window.addEventListener('correctAnswer', event => {
            $("#modalCorrect").addClass("fade");
            $("#modalCorrect").modal('show');
        })

        window.addEventListener('quitWarning', event => {
            $("#modalQuit").addClass("fade");
            $("#modalQuit").modal('show');
        })
        window.addEventListener('incorrectAnswer', event => {
            $("#modalIncorrect").addClass("fade");
            $("#modalIncorrect").modal('show');
        })
        window.addEventListener('results', event => {
            $("#modalResults").addClass("fade");
            $("#modalResults").modal({backdrop: 'static', keyboard: false}, 'show');
        })
    </script>

</div>

