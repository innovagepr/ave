{{--View of the Submit Exercises Warning Modal--}}
<div class="modal-dialog" style="margin-top: 20%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px">

        <div>
            <i class="fas fa-exclamation-triangle" style = "font-size: 30px; margin: 10px; color: red"></i>
            <h1 style ="font-family: Berlin Sans FB; font-size: 30px; color: #2576AC; text-align: center; margin: 5px;" >¿Estás seguro que quieres someter tus ejercicios?</h1>
        </div>
        <form autocomplete="off">

            <p style ="font-family: 'Berlin Sans FB'; font-size: 20px; color: #2576AC" >Tienes <span style="color: red; font-size: 25px">{{$sum}}/10 </span> ejercicios contestados.</p>
            <div class="modal-footer" style="margin:auto;">
                <a style ="text-decoration: none" type="button" class="button4" style="font-size: 20px; margin: 0 auto" wire:click="$emitUp('submitExercise')" data-dismiss="modal">Someter</a>
                <button type="button" class="button3 button1 " style="font-size: 20px; margin: 0 auto" data-dismiss="modal" >Cancelar</button>
            </div>
        </form>
    </div>
</div>








