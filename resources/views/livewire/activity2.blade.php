    {{-- The Master doesn't talk, he acts. --}}
<div>
    <style>
        .container1 {
            width: 600px;
            margin: 100px auto;
        }
        .progressbar {
            counter-reset: step;
        }
        .progressbar li {
            list-style-type: none;
            width: 10%;
            float: left;
            font-size: 12px;
            position: relative;
            text-align: center;
            text-transform: uppercase;
            color: #7d7d7d;
        }
        .progressbar li:before {
            width: 30px;
            height: 30px;
            content: counter(step);
            counter-increment: step;
            line-height: 30px;
            border: 3px solid #7d7d7d;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }
        .progressbar li:after {
            width: 100%;
            height: 4px;
            content: '';
            position: absolute;
            background-color: #7d7d7d;
            top: 15px;
            left: -50%;
            z-index: -1;
        }
        .progressbar li:first-child:after {
            content: none;
        }
        .progressbar li.active {
            color: green;
        }
        .progressbar li.active:before {
            border-color: #55b776;
        }
        .progressbar li.active + li:after {
            background-color: #55b776;
        }
        .iconAudio{
            font-size: 40px;
        }
        .a {
            display: inline-block;
            position: relative;
            margin: 1%;
            float: left;
            width: 70px;
            height: 70px;
            background-color: white;
            border: 4px solid #2576AC;
            text-align: center;
            font-family: "Berlin Sans FB";
            font-size: 45px;
            vertical-align: center;
        }
        .b {
            display: inline-block;
            position: relative;
            margin: 1%;
            float: left;
            width: 60px;
            height: 60px;
            background-color: white;
            border: 4px solid #2576AC;
            text-align: center;
            font-family: "Berlin Sans FB";
            font-size: 45px;
            vertical-align: center;
            cursor: pointer;
        }
        .b:hover{
            background-color: lightskyblue;
        }
    </style>
        <div class="container1" style="float:right;">
            <ul class="progressbar">
                <li class="active" id="1"></li>
                <li id="2"></li>
                <li id="3"></li>
                <li id="4"></li>
                <li id="5"></li>
                <li id="6"></li>
                <li id="7"></li>
                <li id="8"></li>
                <li id="9"></li>
                <li id="10"></li>
            </ul>
        </div>
        {{--<div class="container">
            <p>
                {{ $exercises[$exerciseNumber]['Paragraph'] }}
            </p>
        </div>
    <div>
        <form>
            <fieldset>
                <legend> {{ __("Escoge la opción correcta:") }}</legend>
        @foreach($answers[$exerciseNumber]['options'] as $answer)
            <div>
                <input type="radio" id="">{{ $answer }}
            </div>

        @endforeach
            </fieldset>
        </form>

    </div>--}}
    <div>
        <button class="button button1" wire:click="nextExercise()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
            {{ __('Próximo') }}
        </button>
    </div>
    <div>
        {{ __('DEBUG: ') }} {{ $exerciseNumber }}
    </div>
    <script>
        window.addEventListener('next', event => {

            $(event.detail.number).addClass("active");
        })
    </script>
</div>

