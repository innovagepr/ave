<!DOCTYPE html>
<html>

<style>
    body {
        /*font-family: Arial, Helvetica, sans-serif;*/
        font-family: "Berlin Sans FB";
        font-weight: lighter;
        margin: 0;
        /*height: 100%;*/
        width: 100%;
        position: relative;
        padding: 0px;
    }

    .about-section {
        padding: 15px;
        text-align: center;
        background-color: #1a202c;
        color: #2576ac;
    }
    .about-section2 {
        padding: 15px;
        text-align: center;
        background-color: #cbd5e0;
        color: #2576ac;
    }

    .aveSection{
        font-size: 20px;
        width: 800px;
        /*height: 450px;*/
        border: 4px solid #2576AC;
        margin: 0 auto;
        border-radius: 35px;
        background-color: white;
        padding: 10px;
    }
    .homeIcon{
        font-size: 40px;
        color: #8F8F8F;
        cursor: pointer;
        margin: 0 auto;
        display: flex;
        text-decoration: none;
    }
    .homeIcon:hover{
        color: #6c757d;
    }
</style>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/avelogo.ico')}}">
    <title>Más Información</title>
    <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="about-section">
    <a href="/homepage" class="homeIcon"><i class="fas fa-home"></i></a>
    <div class = "aveSection">
        <h1 style="font-weight: lighter">AVE - Asistencia Virtual Educativa</h1>
        <img style = "width: 230px" src = "{{asset('images/aveLogo1.png')}}" alt = "AVE Official Logo">

        <p>AVE es una herramienta diseñada en Puerto Rico con el fin de que niños entre las edades
            de 8 a 10 años puedan reforzar destrezas en el español a través de actividades educativas y dinámicas. Esta herramienta
            puede ser utilizada tanto por niños como adultos.</p>
    </div>
</div>
<div class= "about-section2">
    <div class = "aveSection">
        <h1 style="font-weight: lighter">innovAGE</h1>
        <img src="{{asset('images/roundInnovAGElogo.png')}}" style="height:200px ;width:200px; align-content: center">

            <p>innovAGE es el nombre del equipo de desarrollo formado para crear y completar el curso de Capstone 2020 del
                programa de Ingeniería en Computadoras de la Universidad de Puerto Rico, Recinto Universitario de Mayagüez.</p>
            <p>innovagepr@gmail.com</p>

    </div>
</div>

</body>
</html>



