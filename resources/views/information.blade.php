<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/avelogo.ico')}}">
    <title>Más Información</title>
    <script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            height: 100%;
            width: 100%;
            position: relative;
            padding: 0px;
            overflow-x: hidden;
        }

        html {
            box-sizing: border-box;
            padding: 0px;
            overflow-x: hidden;

        }

        .column {
            text-align: center;
            width: 100%;
        }

        .about-section {
            padding: 40px;
            text-align: center;
            background-color: #86E0E3;
            color: #073C63;
        }

        .back{
            font-size: 16px;
            text-decoration: none;
            margin-left:20px;
            color: #2576AC;
        }

        .back:hover {
            color: #073C63;
        }

        .content {
            padding-bottom: 100px;
            /* Height of the footer element */
        }
        .footer {
            position: absolute;
            width: 100%;
            height: 100px;
            bottom: 0;
            left: 0;
            /*padding: 1em;*/
            /*top:100%;*/
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="content">
<div class="about-section">
    <h1>AVE - Asistencia Virtual Educativa</h1>

    <img style = "width: 230px" src = "{{asset('images/aveLogo1.png')}}" alt = "AVE Official Logo">

    <p style = "font-size: large" >AVE es una herramienta diseñada en Puerto RIco con el fin de que niños entre edades
        de 8 a 10 años puedan reforzar destrezas en el español a través de actividades educativas y dinámicas. Esta herramienta
        puede ser utilizada tanto por niños como adultos.</p>
</div>

<h2 style="text-align:center">innovAGE</h2>
<div class="row">
    <div class="column">
            <img src="{{asset('images/roundInnovAGElogo.png')}}" style="height:200px ;width:200px; align-content: center">
            <div >
                <p style ="font-size: large; padding: 25px">innovAGE es el nombre del equipo de desarrollo formado para crear y completar el curso de Capstone 2020 del
                    programa de Ingeniería en Computadoras de la Universidad de Puerto Rico, Recinto Universitario de Mayagüez.</p>
                <p>innovagepr@gmail.com</p>
            </div>
    </div>

</div>
</div>

<footer class="footer">
        <a class="back" href="/homepage" ><i style ="font-size: xx-large;" class="fas fa-arrow-alt-circle-left"></i> </a>
</footer>

</body>
</html>
