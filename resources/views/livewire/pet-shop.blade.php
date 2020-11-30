{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div>
    {{--View of the Rewards Store screen--}}

    <div class="main-block-shop">
        <div class="pet-row">
            <div class="columnShop1">
                <img class="store-img" src="{{asset('images/shop.png')}}">
                <p class="wlcm-text" >¡Bienvenido a la tienda de mascotas!</p>
                <p class="desc-txt">Aquí puedes comprar artículos para tu mascota utilizando tus monedas.</p>
                <div>
                    <p class="coin-level-text">Mis Monedas:</p>
                    <div class="shop-row">
                        <img class="level-img" src="{{asset('images/savings.png')}}">
                        <div class="coin-level-box">
                            {{$data['pet']->user->coins}}
                        </div>
                    </div>
                </div>
                <div>
                    <p class="coin-level-text">Nivel de Mascota:</p>
                    <div class="shop-row">
                        <img class="level-img" src="{{asset('images/lvl.png')}}">
                        <div class="coin-level-box">
                            {{$data['pet']->level}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="columnShop2">

                <div class="articleShop-text">
                    <p >Artículos en venta:</p>
                </div>
                {{--Grid containing the articles that the user can buy in the Rewards Store--}}
                <div class="container" wire:poll>
                    <div class="grid-card">
                        <div class="image-grid-container">
                            @foreach($data['rewards'] as $item)

                                @if(($item->price > $data['pet']->user->coins) || ($item->pet_level > $data['pet']->level))
                                    <div class="non-available-article">
                                        <p class="article-lvl"> Nivel {{$item->pet_level}}+</p>
                                        <img class ="img-grid" src="{{$item->image_url}}">
                                        <p class="article-price" style="color: red">{{$item->price}}</p>
                                    </div>

                                @elseif($item->owned())
                                    <div class="owned-article" style="border: 3px solid lightgreen">
                                        <span class="fas fa-check" style="font-size: 25px; color: #398BF6; margin-right: 10px"></span>
                                        <img class ="img-grid" src="{{$item->image_url}}">
                                    </div>
                                @else
                                    <div class="available-article" style="border: 3px solid lightgreen" wire:click="buyArticleModal({{$item->id}},{{$item->price}})">
                                        <p class="article-lvl" style = "color: #19D519"> Nivel {{$item->pet_level}}+</p>
                                        <img class ="img-grid" src="{{$item->image_url}}">
                                        <p class="article-price" style="color: #19D519">{{$item->price}}</p>
                                    </div>
                                @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Modal to confirm the reward purchase--}}
    <div wire:ignore>
        <div class="modal fade" id="buy-article" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:buy-article-modal :rewards="$rewards" :userRewards="$userRewards"/>
        </div>
    </div>

</div>

{{--Script to excecute the modal to confirm the reward purchase--}}
<script>
    window.addEventListener('buyArticle', event => {
        $("#buy-article").modal({backdrop: 'static', keyboard: false},'toggle');
    })
</script>

