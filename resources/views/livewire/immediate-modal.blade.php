
<div class="modal-dialog" style="margin-top: 20%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
        <div>
            <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;"><i class="far fa-frown"></i> Te has equivocado.</h1>
        </div>
        <form autocomplete="off">
            <div class="modal-body" style="text-align: center">
                <table style="text-align: center; font-family: 'Berlin Sans FB'; font-size: 25px; width:100%; border: 2px solid red">
                    <tr >
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Tu Respuesta</th>
                        <th style="font-weight: lighter; text-align: center; color: #2576AC">Respuesta Correcta</th>
                    </tr>
                    <tr>
                        <td>
                            {{$joinedAnswer}}
                        </td>
                        <td style="color: #19D519">
                            {{$word}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer" style="margin:auto;">
                <button wire:click="$emitUp('lastExercise')" type="button" class="button button1 button2" style="font-size: 20px; margin: 0 auto" data-dismiss="modal">Continuar</button>
            </div>
        </form>
    </div>
</div>
