<div>
    <p style="font-size: 20px; font-family: 'Berlin Sans FB'; color: #2576AC">Escuchar Palabra</p>
    <audio controls id="audio">
        <source src="/{{$word2}}.wav" type="audio/ogg">
        <source src="/{{$word2}}.wav" type="audio/mpeg">
        Su navegador no es compatible con la etiqueta de audio.
    </audio>
</div>

<script>
    window.addEventListener('refreshAudio', event => {
        document.getElementById("audio").load();
    })
</script>
