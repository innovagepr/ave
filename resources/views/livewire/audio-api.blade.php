
<div>
    <span  class="btn btn1" onclick="togglePlay()"><i class="fas fa-volume-up fa-lg"></i> Escuchar Palabra </span>
    <audio controls id="audio" controlsList="nodownload" hidden="true">
        <source src="/{{$word2}}.wav" type="audio/ogg">
        <source src="/{{$word2}}.wav" type="audio/mpeg">
        Su navegador no es compatible con la etiqueta de audio.
    </audio>
</div>

{{--Refresca y recarga el archivo de audio--}}
<script>
    window.addEventListener('refreshAudio', event => {
        document.getElementById("audio").load();
    })

    function togglePlay() {
        audio.play();
    }
</script>
