{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

<div style="text-align: center">
    {{-- View of the Activity 1 (Letters/Words) --}}

    <div style="margin-right: 90%">
        {{--        @foreach($tempSplitWords as $tempSplitWord)--}}
        {{--            @foreach($tempSplitWord as $palabras)--}}
        {{--                {{$palabras}}--}}
        {{--            @endforeach--}}
        {{--            <br>--}}
        {{--        @endforeach--}}
        {{--        @foreach($tempPosition as $tempPositions)--}}
        {{--            {{$tempPositions}}--}}

        {{--            <br>--}}
        {{--        @endforeach--}}
        {{--        @foreach($tempAnswers as $tempAnswer)--}}
        {{--            @foreach($tempAnswer as $palabras)--}}
        {{--                {{$palabras}}--}}
        {{--            @endforeach--}}
        {{--            <br>--}}
        {{--        @endforeach--}}
        {{--        @foreach($badAnswers as $nose)--}}
        {{--            @foreach($nose as $eye)--}}
        {{--                {{$eye}}--}}
        {{--            @endforeach--}}
        {{--        @endforeach--}}

    </div>
    {{--Displays the steps bar that shows the current excercise in the screeen--}}
    <div class="main-block-ses">
        <ul class="progressbar">
            <li id="0" class="{{$step == 0 ? 'active':''}}" wire:click="goTo({{0}})"></li>
            <li id="1" class="{{$step == 1 ? 'active':''}}" wire:click="goTo({{1}})"></li>
            <li id="2" class="{{$step == 2 ? 'active':''}}" wire:click="goTo({{2}})"></li>
            <li id="3" class="{{$step == 3 ? 'active':''}}" wire:click="goTo({{3}})"></li>
            <li id="4" class="{{$step == 4 ? 'active':''}}" wire:click="goTo({{4}})"></li>
            <li id="5" class="{{$step == 5 ? 'active':''}}" wire:click="goTo({{5}})"></li>
            <li id="6" class="{{$step == 6 ? 'active':''}}" wire:click="goTo({{6}})"></li>
            <li id="7" class="{{$step == 7 ? 'active':''}}" wire:click="goTo({{7}})"></li>
            <li id="8" class="{{$step == 8 ? 'active':''}}" wire:click="goTo({{8}})"></li>
            <li id="9" class="{{$step == 9 ? 'active':''}}" wire:click="goTo({{9}})"></li>
        </ul>
    </div>

    <div>
        {{--Displays the audio functionality in the screen--}}
        <div class="audio">
            <livewire:audio-api :word="$word"/>
        </div>
        {{--Show the grid boxes containing the sluffled letters and the selected letters for answer and form the word--}}
        <div style="display: flex">
            <table class="table1" >
                <tr>
                    @for ($j = 0; $j < count ($splitWord); $j++)
                        <td class="{{$j == $position2 ? 'green' : 'answerBox'}}">
                            {{$answer[$j]}}
                        </td>
                    @endfor
                    <td>
                        <a wire:click="removeLetter()"><i style="font-size: 40px; color: #ff0000; cursor: pointer; padding: 10px" onmouseover="this.style.color='#B70000'" onmouseout="this.style.color='red'"class="fas fa-backspace"></i></a>
                    </td>
                    <td>
                        <a wire:click = "clearAll()"><i style="font-size: 40px; margin-left: 10px;color: #ff0000; cursor: pointer;" onmouseover="this.style.color='#B70000'" onmouseout="this.style.color='red'"class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            </table>

            <table class="table2">
                <tr>
                    @for ($j = 0; $j < count($splitWord); $j++)
                        <td wire:click.debounce.170ms="placeLetter('{{$j}}','{{ $splitWord[$j] }}')" class="{{$splitWord[$j] == ' ' ? 'letterNoPointer': 'letterBox'}}">
                            <a >{{$splitWord[$j]}}</a>
                        </td>
                    @endfor
                </tr>
                <tr>
                    @if(count($splitWord) == $position2)
                        <td>
                            <a  class = "verify" wire:click="immediateResult()"><i class=" icons1 fas fa-search"></i>verificar</a>
                        </td>
                    @endif

                </tr>
            </table>
            <div class ="bottomRight">
                <a type="button" wire:click ="quitWarning()" class="button5" style="text-decoration: none">Finalizar Actividad<span class="tooltiptext">Haz click aquí para someter la actividad.</span></a>
            </div>
        </div>
    </div>

    {{--Displays the immediate modals, depending on the answers provided by the child--}}
    <div wire:ignore>
        <div class="modal fade" id="immediate-result-modal-Bad" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:immediate-modal :word="$word" :joinedAnswer="$joinedAnswer"/>
        </div>
    </div>

    <div wire:ignore>
        <div class="modal fade" id="final-result-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:final-results-modal :word="$word" :joinedAnswer="$joinedAnswer"/>
        </div>
    </div>

    <div wire:ignore>
        <div class="modal fade" id="immediate-modal-good" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:immediate-modal-good :word="$word" :joinedAnswer="$joinedAnswer"/>
        </div>
    </div>
    <div wire:ignore>
        <div class="modal fade" id="quit-warning" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:quit-warning/>
        </div>
    </div>

</div>

{{--Scripts to excesute the modals--}}
<script>
    window.addEventListener('toggleResultModal', event => {
        $("#immediate-result-modal-Bad").modal('toggle');
    })
    window.addEventListener('immediateResultGood', event => {
        $("#immediate-modal-good").modal('toggle');
    })
    window.addEventListener('finalResult', event => {
        $("#final-result-modal").modal('toggle');
    })
    window.addEventListener('quitWarning', event => {
        $("#quit-warning").modal('toggle');
    })
</script>
