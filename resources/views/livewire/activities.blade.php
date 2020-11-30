{{-- Stop trying to control. --}}

<div>
<div class="activities-info mt-6 flex">
    {{--    <div class="flex m-auto">--}}
    <div class="button-area">
        <button class="{{$showPrev}}" wire:click="change">
            <div class="m-auto select-button">
                <img src="{{asset('images/arrow_prev.png')}}">
            </div>
            <div>
                {{__('Anterior')}}
            </div>
        </button>
    </div>
    <div class="act-square flex">
        <div class="half-square float-left">
            @auth
                <div class="ml-5">
                    <button class="center list-button py-1 my-2" wire:click="showAssigned">
                        <span class="pr-1 fas fa-list "></span>
                        {{__('Ejercicios Asignados')}}
                        <span class="badge">{{auth()->user()->assignedLists->count()}}</span>
                    </button>
                </div>
            @endauth
            <div class="act-main-square">
                <div class="m-auto center activity-name">
                    <p>
                        {{$index + 1}}
                    </p>
                    <p class="activity-name">
                        {{$activity->name}}
                    </p>

                </div>
            </div>
            <div class="ml-3 mt-2 center activity-rules">
                <p>{{__('Instrucciones')}}</p>
                <br>
                <p>{{$activity->rules}}</p>
            </div>
        </div>
        <div class="half-square float-right">
            <div class="flex flex-col center">
                @foreach($levels as $level)
                    <button class="center level-button py-2 my-4">{{$level->name}}</button>

                @endforeach
            </div>

        </div>

    </div>
    <div class="button-area">
        <button class="{{$showNext}}" wire:click="change">

            <div class=" m-auto select-button">
                <img src="{{asset('images/arrow_next.png')}}">
            </div>
            <div>
                {{__('Siguiente')}}
            </div>
        </button>

    </div>

</div>



