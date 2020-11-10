
<div class="modal-dialog" style="margin-top: 20%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">
        <div>
            <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;" >¡Bien Hecho!</h1>
            <h1 style ="font-family: Berlin Sans FB; font-size: 40px; color: #2576AC; text-align: center; margin: 10px;">Formaste la palabra correctamente.</h1>
        </div>
        <form autocomplete="off">

                <div class="modal-body" style="text-align: center;">
                    <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/satisfaction.png')}}"> +2 puntos</p>
                    <p style="font-family: 'Berlin Sans FB'; font-size: 25px; vertical-align: middle; color: #19D519; margin: 10px;"><img style="width:35px; height:35px; float: inherit; vertical-align: middle; display: inline;" src="{{asset('images/savings.png')}}"> +5 monedas</p>
                </div>

            <div class="modal-footer" style="margin:auto;">
                <button wire:click="$emitUp('lastExercise')" type="button" class="button button1 button2" style="font-size: 20px; margin: 0 auto" data-dismiss="modal" >Continuar</button>
            </div>
        </form>
    </div>
</div>








