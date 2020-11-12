<div style="text-align: center">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

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
        <div style=" top: 20%; left:40%; display:inline-block; position: absolute">
            <livewire:audio-api :word="$word"/>
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

</div>

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

</script>
