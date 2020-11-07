<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    .button2{
        font-family: "Berlin Sans FB";
        background-color: #ACF9A4;
        color: #073C63;
        border-radius: 40px;
        border: 3px solid #2576AC;
        display: inline-block;
        font-size: 20px;
        margin: 5px 5px;
        cursor: pointer;
        padding: 5px 10px;
        transition-duration: 0.4s;
    }
    .button1:hover{
        background-color: #52C5AB;
    }
    .modal-content{
        border: 3px solid #2576AC;
        border-radius: 30px;
    }

    .message{
        font-family: "Berlin Sans FB";
        font-size: 40px;
        color: #2576AC;
        text-align: center;
        margin: 10px;
    }
    .imgSz{
        width:35px;
        height:35px;
        float: inherit;
        vertical-align: middle;
        display: inline;
    }

    .bodyPop{
        font-family: 'Berlin Sans FB';
        font-size: 25px;
        vertical-align: middle;
        color: #19D519;
        margin: 10px;
    }
</style>



<div class="modal fade border" id="modalImmediateResultGood" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <h1 class="message">¡Bien Hecho!</h1>
                <h1 class="message">Formaste la palabra correctamente.</h1>
            </div>
            <div class="modal-body" style="text-align: center;">

                <p class="bodyPop"><img class="imgSz" src="{{asset('images/satisfaction.png')}}"> +2 puntos</p>
                <p class="bodyPop"><img class="imgSz" src="{{asset('images/savings.png')}}"> +5 monedas</p>
            </div>
            <div class="modal-footer" style="margin: 0 auto;">
                <button type="button" class="button button1 button2" data-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade border" id="modalImmediateResultBad" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <h1 class="message"><i class="far fa-frown"></i> Te has equivocado.</h1>
            </div>
            <div class="modal-body" style="text-align: center;">
                <x-table>
                    <x-slot name="head">

                        <x-table.heading>Tu Respuesta</x-table.heading>
                        <x-table.heading>Respuesta Correcta</x-table.heading>

                    </x-slot>
                    <x-slot name="body">

                        <x-table.row>
                            <x-table.cell>hira</x-table.cell>
                            <x-table.cell>{{$word}}</x-table.cell>
                        </x-table.row>
                    </x-slot>
                </x-table>
                {{--                <p class="bodyPop"><img class="imgSz" src="{{asset('images/satisfaction.png')}}">+2 mojón</p>--}}
            </div>
            <div class="modal-footer" style="margin: 0 auto;">
                <button type="button" class="button button1 button2" data-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>
