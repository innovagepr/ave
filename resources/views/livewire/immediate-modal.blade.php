{{--View for the immediate modal for a provided wrong answer--}}
<div class="modal-dialog" style="margin-top: 10%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
        <div>
            <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">¡No te desanimes! La próxima vez te irá mejor.</h1>
        </div>
        <form autocomplete="off">
            {{--Shows feedback on the wrong answer and shows the correct word--}}
            <div class="modal-body" style="text-align: center">
                <table style="text-align: center; font-family: 'Berlin Sans FB'; font-size: 25px; width:100%; border: 2px solid red; margin: 5px;">
                    <tr >
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Tu Respuesta | </th>
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Respuesta Correcta | </th>
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Escuchar</th>
                    </tr>
                    <tr>
                        <td>
                            {{$joinedAnswer}}
                        </td>
                        <td style="color: #19D519">
                            {{$word}}
                        </td>
                        <td>
                            <span class="audioFeedback" onclick="togglePlayFeedback()"><i class="fas fa-volume-up fa-lg"></i></span>
                            <audio controls id = "feedbackAudio" controlsList="nodownload" hidden="true">
                                <source src="/{{$word}}.wav" type="audio/ogg">
                                <source src="/{{$word}}.wav" type="audio/mpeg">
                                Su navegador no es compatible con la etiqueta de audio.
                            </audio>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer" style="margin:auto;">
                <button type="button" class="button button1 button2" style="font-size: 20px; margin: 0 auto" data-dismiss="modal">Continuar</button>
            </div>
        </form>
    </div>
</div>

{{--Function to refresh the word for the aduio functionality in the modal--}}
<script>
    window.addEventListener('refreshAudio', event => {
        document.getElementById("feedbackAudio").load();
    })
    function togglePlayFeedback() {
        feedbackAudio.play();
    }
</script>
