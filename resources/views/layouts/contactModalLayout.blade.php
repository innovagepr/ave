{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
<style>
    .button2{
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

</style>
<div class="modal fade border" id="modalForm" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" >
{{--                <h5 class="modal-title text-center">¡Contáctanos!</h5>--}}
                <p style="font-family: 'Berlin Sans FB'; font-size: 30px; color: #2576AC;">¡Contáctanos!</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" style="text-align: center;">
                <div><img style=" padding: 30px;width:250px; height:250px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></div>
               <p style="font-size: 18px">De tener alguna duda, pregunta o sugerencia nos puede contactar a nuestro correo electrónico:</p>
                <a style="font-size: 18px" href = "mailto: innovagepr@gmail.com">innovagepr@gmail.com</a>

            </div>
{{--            <div class="modal-footer" style="margin: 0 auto;">--}}
{{--                <button type="button" class="button button1 button2" data-dismiss="modal">Continuar</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
