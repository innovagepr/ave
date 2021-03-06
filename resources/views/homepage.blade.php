<!DOCTYPE html>
<html>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('images/avelogo.ico')}}">

<head>
    <title>AVE</title>
    <style>
        html{
            overflow-x: hidden;
            box-sizing: border-box;
            padding: 0px;
        }
    </style>
    {{--Styles--}}
    <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">
<div id="page-container2">
    <nav class="topnav">
        {{--If it is a legged user, shows the appropiate menu options--}}
        <div class="topnav-right">
            @if(Auth::check())
                <a style="text-decoration: none" href="{{ route('dashboard') }}"><span class="far fa-id-card fa-lg"></span> Tablero</a>
            @endif
            @if(!Auth::check())
                <a style="text-decoration: none" href="{{ route('login') }}"><span class="fas fa-sign-in-alt fa-lg"></span> Inicia Sesión</a>
                <a style="text-decoration: none" id="separator"> | </a>
                <a style="text-decoration: none" href="{{ route('register') }}"><span class="fas fa-user-circle fa-lg"></span> Crear Cuenta</a>
            @endif
        </div>
    </nav>
    <div id="content-wrap">
        <div id = "homeRow" class="row">
            <div id = "cell1" class="cell">
                <img id = "aveimg" src = "{{asset('images/aveLogo1.png')}}" alt = "AVE Official Logo">
            </div>

            <div id = "cell2" class="cell">
                <div style="text-align: center">
                    <p style = "font-size: 100px; color: #073C63">¡Bienvenido a AVE!</p>
                    <p style="font-size: 50px; color: #2576AC">¡Aprende mientras te diviertes!</p>
                    <a type ="button" style = "text-decoration: none" class= "button button1" href="{{ route('activities') }}"> Comienza</a>

                </div>
            </div>
        </div>
    </div>
    @extends('layouts/contactModalLayout')
    {{--Footer containing the links to other views and modal--}}
    <footer class="footer">
        <a style="text-decoration: none" class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
        <a style="text-decoration: none" class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
        <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>
    </footer>
</div>
</body>
</html>
