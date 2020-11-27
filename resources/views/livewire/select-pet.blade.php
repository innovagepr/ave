
<div>
    <div class="main-block-pet-select">
        <div class="header-select">
            <p>¡Selecciona tu mascota!</p>
        </div>
        <div class="pet-select-row">
            @foreach($pet as $peti)
                <div class="columnPetSelect1">
                    <div class="select-title">{{$peti->name}}</div>
                    <div class="select-petCard" wire:click="selectPet({{$peti->id}})">
                        <img class="pet-img-select" src="{{$peti->icon_url}}">
                    </div>
                    <div class="select-desc-txt">
                        <p>{{$peti->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div wire:ignore>
        <div class="modal fade" id="pet-select" tabindex="-1" role="dialog" aria-hidden="true">
            <livewire:select-pet-modal/>
        </div>
    </div>

</div>

<script>
    window.addEventListener('selectPet', event => {
        $("#pet-select").modal('toggle');
    })
</script>
