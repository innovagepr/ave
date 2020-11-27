
<div class="modal-dialog" style="margin-top: 20%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
        <div>
            <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡Bien Hecho!</h1>
            <h2 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">Lograste acertar 8/10 preguntas.</h2>
        </div>
        <form autocomplete="off">
            <div class="modal-body" style="text-align: center">
                <h3>Solo te equivocaste en 2 ejericios:</h3>
                <table style="text-align: center; font-family: 'Berlin Sans FB'; font-size: 25px; width:100%; border: 2px solid red">
                    <tr >
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Ejercicio</th>
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Tu Respuesta</th>
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Respuesta Correcta</th>
                    </tr>
                    <tr>
{{--                        @for($i=0;$i<count($badWords);$i++)--}}
                            @foreach($badAnswers as $incorrect)


                        <td>
                            7
                        </td>
                        <td>
                            {{$incorrect}}
                        </td>
                        <td style="color: #19D519">
                            fauna
                        </td>
                        @endforeach
                    </tr>
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            9--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            sapo--}}
{{--                        </td>--}}
{{--                        <td style="color: #19D519">--}}
{{--                            sopa--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                </table>
            </div>
            <div class="modal-footer" style="margin:auto;">
                <a type ="button" style = "text-decoration: none; font-size: 20px; margin: 0 auto" class= "button button1 button2" href="{{ route('activities') }}"> Finalizar</a>
            </div>
        </form>
    </div>
</div>
