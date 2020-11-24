
<div id="modal1" class="modal-dialog" style="margin-top: 20%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px; text-align: center">

        <div>
            <img class="level-img" src="{{asset('images/savings.png')}}">
            <h1 style ="font-family: Berlin Sans FB; font-size: 25px; color: #2576AC; text-align: center; margin: 5px;" >Este artículo cuesta <spam style="color: #19D519">{{$price}}</spam> monedas.</h1>
        </div>
        <form autocomplete="off">
            <div class="modal-footer" style="margin:auto; text-align: center">
                <a type="button" class="button4" style="font-size: 20px; margin: auto" wire:click = "buyArticle({{$itemId}}, {{$price}})" ><i class="far fa-check-circle" style="margin-right: 5px" ></i>Comprar</a>
                <button type="button" class="button3 button1" style="font-size: 20px; margin: auto"  data-dismiss="modal"><i class="far fa-times-circle" style="margin-right: 5px "l></i>Cancelar</button>
            </div>
        </form>
    </div>
</div>

@if($open)
    <!-- Modal -->
    <div id="modal1" class="modal-dialog" style="margin-top: 20%; ">
        <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px; text-align: center">
            <div>
                <h1 style ="font-family: Berlin Sans FB; font-size: 25px; color: #2576AC; text-align: center; margin: 5px;" >¡Excelente compra!</h1>
            </div>
            <form autocomplete="off">
                <div class="modal-footer" style="margin:auto; text-align: center">
                    <button type="button" class="button3 button1" style="font-size: 20px; margin: auto"  data-dismiss="modal">Continuar</button>
                </div>
            </form>
        </div>
    </div>
@endif







