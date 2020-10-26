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
</head>

{{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />

<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB'; line-height: normal ;position: relative; margin: 0; height: 100%; width: 100%; overflow-x: hidden">

<nav class="topnav">
    <div class="topnav-right">
        <a href="{{ route('login') }}"><span class="fas fa-sign-in-alt fa-lg"></span> Inicia Sesión</a>
        <a class = "inactive"> | </a>
        <a href="{{ route('register') }}"><span class="fas fa-user-circle fa-lg"></span> Crear Cuenta</a>
    </div>
</nav>

<div id = "homeRow" class="row">

    <div id = "cell1" class="cell">

            <img id = "aveimg" src = "{{asset('images/aveLogo1.png')}}" alt = "AVE Official Logo">
    </div>

    <div id = "cell2" class="cell">
        <div style="text-align: center">
        <p style = "font-size: 100px; color: #073C63">¡Bienvenido a AVE!</p>
        <p style="font-size: 50px; color: #2576AC">¡Aprende mientras te diviertes!</p>

        <button class= "button button1" >Comienza</button>
        </div>
    </div>
</div>
@extends('layouts/contactModalLayout')
<footer class="footer">

        <a class="a1 a2" href="/information"><span class="left; fas fa-info-circle fa-lg"></span> Más Información</a>
        <a class="a1 a2" href="#" data-toggle="modal" data-target="#modalForm"><span class="fas fa-phone-alt fa-lg"></span> Contáctanos</a>
        <p style = "margin-right:20px; font-size: 16px; color: #073C63" class="right">Por innovAGE<img style="margin-left: 10px; width:28px; height:28px" src = "{{asset('images/roundInnovAGElogo.png')}}" alt = "innovAGE_logo"></p>

</footer>

</body>
</html>
