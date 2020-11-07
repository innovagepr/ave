    {{-- The Master doesn't talk, he acts. --}}
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

    @extends('layouts/app')
    <head>
        <title>{{ __('AVE - Actividad 2') }}</title>
        <style>
            html{
                overflow-x: hidden;
                box-sizing: border-box;
                padding: 0px;
            }
        </style>
    </head>

    @section('content')

        <div class="container1" style="float:right;">
            <ul class="progressbar">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <div class="container">
            <p>Hola, Santiago:
                Te escribo porque quiero invitarte a ver una Película en mi casa. Mi mamá dice que puede ser el sábado que viene. Invité a Josué y a Omar, así que no te la puedes perder.
            </p>
            <p> 12%20</p>
            <p>Te espero,</p>
            <p>Tu amigo Ismael</p>
        </div>

        {{--<div class="container1">

            <div class="iconAudio">
                <a href="/homepage"><i class="fas fa-volume-up"></i></a>
            </div>

        </div>

        <div>
            <a>{{ __('Something jhjejejej') }}</a>
        </div>--}}
    @endsection

