<div>
    {{-- The whole world belongs to you --}}

    <div class="main-block-full">

        <div class="first-row">
            <x-jet-label class="m-auto">{{$pet->name}}</x-jet-label>

            <x-jet-label class="m-auto"> Level: {{$pet->level}}</x-jet-label>
        </div>

        <div class="first-row">
            <div class="column">
                <div class="dashboard-card2 big-block" style="background-color: {{$pet->background_color}}">
                    <img src="{{$pet->petType->icon_url}}">
                </div>
            </div>
            <div class="column">
                <div class="dashboard-card2 lg-block " >
                </div>
                <div class="dashboard-card2 lg-block ">
                </div>
                <div class="first-row">
                    <div>
                        {{--                        Aquí--}}
                    </div>
                    <div>
                        {{--                        Aqui--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
