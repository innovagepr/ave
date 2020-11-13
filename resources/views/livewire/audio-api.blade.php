<div>
    <p style="font-size: 20px; font-family: 'Berlin Sans FB'; color: #2576AC">Escuchar Palabra</p>
    <audio controls id="audio" controlsList="nodownload" hidden = "true">
        <source src="/{{$word2}}.wav" type="audio/ogg">
        <source src="/{{$word2}}.wav" type="audio/mpeg">
        Su navegador no es compatible con la etiqueta de audio.
    </audio>

    <div class="player" style="font-size: 20px">
        <img id ="button" onclick="togglePlay()" src ="https://image.flaticon.com/icons/svg/149/149657.svg" style="width: 25px; height: 25px">
{{--        <audio controls id="audio">--}}
{{--            <source src="/{{$word2}}.wav" type="audio/ogg">--}}
{{--            <source src="/{{$word2}}.wav" type="audio/mpeg">--}}
{{--        </audio>--}}
    </div>

    <span class="fas fa-volume-up fa-lg"></span>

</div>

{{--Refresca y recarga el archivo de audio--}}
<script>
    window.addEventListener('refreshAudio', event => {
        document.getElementById("audio").load();
    })

    function togglePlay() {
        var audio = document.getElementsByTagName("audio")[0];

        if (audio) {
            if (audio.paused) {
                audio.play();
                document.getElementById("button").src = "https://image.flaticon.com/icons/svg/149/149658.svg";
            } else {
                audio.pause();
                document.getElementById("button").src ="https://image.flaticon.com/icons/svg/149/149657.svg";
            }
        }
    }
</script>
