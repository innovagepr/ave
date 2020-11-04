<div style="text-align: center">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}


    <h1>PALABRA: {{$word}}</h1>
    <h1> Unordered: {{  $shuffledWord }}</h1>
    <div style="text-align: center">


        {{--<p>Split: {{ print_r($arr2 = str_split($arr1), true) }}</p>--}}
{{--        {{! ($arr2 = str_split($shuffledWord)) }}--}}

        <table style="margin-left: 50%; margin-right: auto; width: 100%">
            <tr>
                <td>
                    <div class = "a">

                    </div>
                    @for ($j = 0; $j < count($answer); $j++)
                        <div class="a">
                            {{$answer[$j]}}
                        </div>
                    @endfor
                </td>
            </tr>

                <div>
                    @for($r=0; $r < count($splitWord); $r++)
                        {{$r}}
                    @endfor
                    <a wire:click="removeLetter({{$r}})"><i style="font-size: 40px; color: #ff0000; cursor: pointer " class="fas fa-backspace"></i></a>
                </div>



            <tr>
                <td>

                    @for ($j = 0; $j < count($splitWord); $j++)

                        <p class="b">
                            <a wire:click="placeLetter('{{$j}}','{{ $splitWord[$j] }}')">{{$splitWord[$j]}}</a>
                        </p>
                    @endfor
                </td>
            </tr>
            <tr>
{{--                <p>Join: {{ $arr3 = join("", $splitWord) }} </p>--}}
            </tr>
        </table>

    </div>
</div>
