{{--View for the modal showing the summary of the activity. Shows a list of the wrong answers (if any).--}}
<div class="modal-dialog modal-lg" style="margin-top: 1%">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
        @if(count($correctAnswers) != 10)
            <div>
                <div>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡Bien Hecho!</h1>
                    <h2 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">Lograste acertar <span style="color: #19D519">{{$sum-count($badAnswers)}}/10</span> preguntas.</h2>
                    @if(auth()->user())
                        <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/satisfaction.png')}}"> +{{count($correctAnswers)*2}} puntos</p>
                        <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/savings.png')}}"> +{{count($correctAnswers)*5}} monedas</p>
                    @endif
                </div>
                <form autocomplete="off">
                    <div class="modal-body" style="text-align: center">
                        <h2 style ="font-family: Berlin Sans FB; font-size: 25px; color: #2576AC; text-align: center; margin: 5px;">Solo te equivocaste en <span style="color: red">{{10 -( $sum - count($badAnswers))}}</span> ejericios:</h2>
                        <table style="text-align: center; font-family: 'Berlin Sans FB'; font-size: 25px; width:100%; border: 2px solid red">
                            <tr>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Ejercicio</th>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Tu Respuesta</th>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Respuesta Correcta</th>
                                <th style="font-weight: lighter; text-align: center; color: #2576AC">Escuchar</th>
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
                                    <td>
                                        <audio controls controlsList="nodownload">
                                            <source src="/{{$incorrect[2]}}.wav" type="audio/ogg">
                                            <source src="/{{$incorrect[2]}}.wav" type="audio/mpeg">
                                            Su navegador no es compatible con la etiqueta de audio.
                                        </audio>
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
        @else
            <div>
                <div>
                    <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡Increíble!</h1>
                    <h2 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡Lograste acertar todas las palabras!</h2>
                    @if(auth()->user())
                        <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/satisfaction.png')}}"> +20 puntos</p>
                        <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/savings.png')}}"> +50 monedas</p>
                    @endif
                </div>
                <form autocomplete="off">
                    <div class="modal-footer" style="margin:auto;">
                        <a type ="button" style = "text-decoration: none; font-size: 20px; margin: 0 auto" class= "button button1 button2" href="{{ route('activities') }}">Finalizar</a>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
