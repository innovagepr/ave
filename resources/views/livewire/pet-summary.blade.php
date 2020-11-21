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
                    {{--                    <img src="{{$pet->petType->icon_url}}">--}}
                    <img style="width: 65%; height: 65%; margin: auto; display: block; margin-top: 20%" src="{{asset('images/dog.png')}}">
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
                            <img class="level-img" src="{{asset('images/catadult.png.png')}}">
                        @endif
                    </div>
                </div>

                <div class="article-text">
                    <p >Artículos de mi mascota:</p>
                </div>

                <div class="pet-articles-card">
                </div>
                <div class="article-text">
                    <p >Color de Fondo:</p>
                </div>
                <div class="pet-row">
                    <div class="colorBox" style="background-color: #52C5AB">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: lightgreen">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: lightpink">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: crimson">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: #398BF6">
                        {{--                        Aquí--}}
                    </div>
                    <div class="colorBox" style="background-color: goldenrod">
                        {{--                        Aquí--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
