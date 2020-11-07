

<div style="text-align: center">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}


    <h1>PALABRA: {{$word}}</h1>
    <h1> Unordered: {{  $shuffledWord }}</h1>
    <h1>Answer Positions:
        @foreach($positions as $position)
            {{$position}}
        @endforeach
    </h1>

    <div>

        {{--                <audio controls>--}}
        {{--                    <source src="/{{$word}}.wav" type="audio/ogg">--}}
        {{--                    <source src="/{{$word}}.wav" type="audio/mpeg">--}}
        {{--                    Your browser does not support the audio tag.--}}
        {{--                </audio>--}}

        <div style=" top: 25%; left:45%; display:inline-block; position: absolute">
            <a class="audio1" wire:click="tts({{$word}})"><i class="icons1 fas fa-volume-up"></i> Escuhar la palabra</a>
        </div>

        <div style="display: flex">
            <table class="table1" >
                <tr>
                    @for ($j = 0; $j < count ($answer); $j++)
                        <td class="answerBox" style="text-align: center">
                            {{$answer[$j]}}
                        </td>
                    @endfor
                    <td>
                        <a wire:click="removeLetter()"><i style="font-size: 40px; color: #ff0000; cursor: pointer " class="fas fa-backspace"></i></a>
                    </td>
                </tr>

                <tr>
                    @for ($j = 0; $j < count($splitWord); $j++)

                        <td class="letterBox">
                            <a wire:click="placeLetter('{{$j}}','{{ $splitWord[$j] }}')">{{$splitWord[$j]}}</a>
                        </td>
                    @endfor
                </tr>
            </table>
        </div>

        <div style="display: flex">
            @if(strlen($word) == $position2)
                <a  class = "verify" wire:click="immediateResult()"><i class=" icons1 fas fa-search"></i>verificar</a>
            @endif
        </div>

    </div>
</div>

<script>
    window.addEventListener('immediateResultGood', event => {
        $("#modalImmediateResultGood").modal('show');
    })
    window.addEventListener('immediateResultBad', event => {
        $("#modalImmediateResultBad").modal('show');
    })
</script>
