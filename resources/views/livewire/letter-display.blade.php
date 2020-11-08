
{{--@extends('layouts/immediateResultModal')--}}

<div style="text-align: center">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

{{--@if($step == 1 )--}}
{{--    Hola Llegaste al {{$step}}--}}
{{--    @endif--}}

{{--    {{$purchase_order->status == 'Ordered' ? 'table-no-stock' : ($purchase_order->status == 'Received' ? 'table-stock' : 'table-reorder')}}--}}

    <div class="main-block-ses">
        <ul class="progressbar">
            <li id="0" class="{{$step == 0 ? 'active':''}}"></li>
            <li id="1" class="{{$step == 1 ? 'active':''}}"></li>
            <li id="2" class="{{$step == 2 ? 'active':''}}"></li>
            <li id="3" class="{{$step == 3 ? 'active':''}}"></li>
            <li id="4" class="{{$step == 4 ? 'active':''}}"></li>
            <li id="5" class="{{$step == 5 ? 'active':''}}"></li>
            <li id="6" class="{{$step == 6 ? 'active':''}}"></li>
            <li id="7" class="{{$step == 7 ? 'active':''}}"></li>
            <li id="8" class="{{$step == 8 ? 'active':''}}"></li>
            <li id="9" class="{{$step == 9 ? 'active':''}}"></li>
        </ul>
    </div>





    <div>
        <div>
            <h1>Palabra: {{$word}}</h1>
            <h1> Unordered: {{  $shuffledWord }}</h1>
            <h1>Answer Positions:
                @foreach($positions as $position)
                    {{$position}}
                @endforeach
            </h1>
            <h1>
                Joined Answer: {{join($answer)}}
            </h1>
            <h1>
                HH: {{$joinedAnswer}}
            </h1>
        </div>

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

<div wire:ignore>
    <div class="modal fade" id="galaxy-form-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <livewire:immediate-modal :word="$word" :joinedAnswer="$joinedAnswer"/>
    </div>
</div>

<script>
    // window.livewire.on('toggleGalaxyFormModal', () => $('#galaxy-form-modal').modal('toggle'));
    window.addEventListener('toggleGalaxyFormModal', event => {
        $("#galaxy-form-modal").modal('toggle');
    })
    // window.addEventListener('immediateResultGood', event => {
    //     $("#modalImmediateResultGood").modal('show');
    // })
    // window.addEventListener('immediateResultBad', event => {
    //     $("#modalImmediateResultBad").modal('show');
    // })
</script>
