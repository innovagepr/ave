<div>
    {{-- The whole world belongs to you --}}

    {{--View for the user's pet dashboard--}}

    {{$pet->pet_rewards}}
    {{--    TODO: Quitar esto--}}

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
                <div class="dashboard-petCard" style="background-color: {{$pet->background_color}}" wire:poll>
                    <img style="width: 350px; height: 350px; margin: auto; display: block; margin-top: 3%; border-radius: 15px" src="/avatar_{{Auth::id()}}.png">
                </div>
            </div>
            {{--Shows the progress bar and level of the user's pet--}}
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
                    <p style="font-size: 20px; color: #2576AC; font-family: 'Berlin Sans FB'"> Puntos necesarios para el próximo nivel de tu mascota: {{$pet->level * 20}}</p>
                </div>
                <div class="article-text">
                    <p >Artículos de mi mascota:</p>
                </div>
                {{--Shows the user's owned rewards. If an item is clicked, a function is excecuted to attach or detach it from the avatar pet--}}
                <div class="pet-articles-card">
                    @foreach($data['rewards'] as $item)
                        @if($item->owned())
                            @if($item->selected())
                                <div class="article-box article-box2" wire:click="detachItem({{$item}})">
                                    <img class ="img-grid-pet" src="{{$item->image_url}}">
                                </div>
                            @else
                                <div class="article-box" wire:click="buildAvatar({{$item}})">
                                    <img class ="img-grid-pet" src="{{$item->image_url}}">
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                {{--Shows the available colors to choose in order to change the pet avatar background--}}
                <div class="article-text">
                    <p >Color de Fondo:</p>
                </div>
                <div class="pet-row">
                    <div class="colorBox" style="background-color: #52C5AB" wire:click="changeColor('#52C5AB')">
                    </div>

                    <div class="colorBox" style="background-color: lightgreen" wire:click="changeColor('lightgreen')">
                    </div>

                    <div class="colorBox" style="background-color: lightpink" wire:click="changeColor('lightpink')">
                    </div>

                    <div class="colorBox" style="background-color: crimson" wire:click="changeColor('crimson')">
                    </div>

                    <div class="colorBox" style="background-color: #398BF6" wire:click="changeColor('#398BF6')">
                    </div>

                    <div class="colorBox" style="background-color: goldenrod" wire:click="changeColor('goldenrod')">
                    </div>

                    <div class="colorBox" style="background-color: purple" wire:click="changeColor('purple')">
                    </div>

                    <div class="colorBox" style="background-color: coral" wire:click="changeColor('coral')">
                    </div>

                    <div class="colorBox" style="background-color: transparent" wire:click="changeColor('transparent')">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

