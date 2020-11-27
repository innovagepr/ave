<div>
    {{-- The whole world belongs to you --}}

    <div class="main-block-pet">

        <div class="header-row">
            <p class="pet-name">{{$pet->name}}</p>
        </div>
        <div class="header-row">
            @if($pet->level <= 10 && $pet->petType->slug == 'perro')
                <p class="pet-level"> cachorro - Nivel {{$pet->level}}</p>
            @elseif($pet->level <= 10 && $pet->petType->slug == 'gato')
                <p class="pet-level"> gatito - Nivel {{$pet->level}}</p>
            @else
                <p class="pet-level"> adulto - Nivel {{$pet->level}}</p>
            @endif
        </div>

        <div class="pet-row">
            <div class="columnPet1">
                <div class="dashboard-petCard" style="background-color: {{$pet->background_color}}">
                    <img style="width: 250px; height: 250px; margin: auto; display: block; margin-top: 20%" src="{{$pet->petType->icon_url}}">
                    {{--                    <img style="width: 250px; height: 250px; margin: auto; display: block; margin-top: 20%" src="{{asset('images/dog.png')}}" usemap="#petmap">--}}

                    {{--                    <map name="petmap">--}}
                    {{--                        <area shape="circle" coords="125,0,40" alt="hat" wire:click="quitHat()" style="cursor: pointer">--}}
                    {{--                        --}}{{--                        <area shape="rect" coords="290,172,333,250" alt="Phone" href="phone.htm">--}}
                    {{--                        --}}{{--                        <area shape="circle" coords="337,300,44" alt="Cup of coffee" href="coffee.htm">--}}
                    {{--                    </map>--}}

                </div>
            </div>
            <div class="columnPet2">
                <p style = "font-family: 'Berlin Sans FB'; font-size: 20px; color: red; text-align: right; margin-right: 15%" >Nivel 10+</p>

                <div class="pet-level-card" >
                    <div class="level-row">
                        @if($pet->petType->slug=='perro')
                            <img class="level-img" src="{{asset('images/puppy.png')}}">
                        @else
                            <img class="level-img" src="{{asset('images/cat.png')}}">
                        @endif
                        <progress class="pet-progress" value="{{$pet->level}}" max="10"></progress>
                        @if($pet->petType->slug=='perro')
                            <img class="level-img" src="{{asset('images/dogadult.png')}}">
                        @else
                            <img class="level-img" src="{{asset('images/catadult.png')}}">
                        @endif
                    </div>
                </div>

                <div class="article-text">
                    <p >Artículos de mi mascota:</p>
                </div>

                <div class="pet-articles-card">
                    @foreach($data['rewards'] as $item)
                        @if($item->owned())
                            <div class="article-box" wire:click="buildAvatar()">
                                <img class ="img-grid-pet" src="{{$item->image_url}}">
                            </div>
                        @endif
                    @endforeach
                </div>


                <div class="article-text">
                    <p >Color de Fondo:</p>
                </div>
                <div class="pet-row">
                    <div class="colorBox" style="background-color: #52C5AB" wire:click="changeColor('#52C5AB')">
                        {{--                        Aquí--}}

                    </div>
                    <div class="colorBox" style="background-color: lightgreen" wire:click="changeColor('lightgreen')">

                    </div>
                    <div class="colorBox" style="background-color: lightpink" wire:click="changeColor('lightpink')">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: crimson" wire:click="changeColor('crimson')">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: #398BF6" wire:click="changeColor('#398BF6')">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: goldenrod" wire:click="changeColor('goldenrod')">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: purple" wire:click="changeColor('purple')">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: coral" wire:click="changeColor('coral')">
                        {{--                        Aquí--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function checkMark(){
        var x = document.getElementById('check');
        x.hidden;
    }
</script>
