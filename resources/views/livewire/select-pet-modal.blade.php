{{--View of the Pet Selection Modal--}}
<div id="modal1" class="modal-dialog" style="margin-top: 3%; ">
    <div class="modal-content" style="border: 3px solid #2576AC; border-radius: 40px; text-align: center">
        <div>
            <h1 style ="font-family: Berlin Sans FB; font-size: 35px; color: #2576AC; text-align: center; margin: 5px;" >¡Buena elección!</h1>
            <div>
                @foreach($data['petType']->where('id', $petId) as $type)
                    <div class="select-title">{{$type->name}}</div>
                    <div class="select-petCard2">
                        <img class="pet-img-select" src="{{$type->icon_url}}">
                    </div>
                @endforeach
            </div>
            <div>
                <h1 style ="font-family: Berlin Sans FB; font-size: 25px; color: #2576AC; text-align: center; margin: 5px; padding: 10px" >¿Cómo se llamará tu mascota?</h1>
                <form wire:submit.prevent="submit" style="margin-bottom: 30px">
                    <input type="text" placeholder="Escribe un nombre." style="border: 2px solid #2576AC; text-align: center; font-size: 20px" wire:model="name">
                    @error('name') <span class="error" style="display: block; color: red">Debes poner un nombre a tu mascota.</span>@enderror
                </form>
            </div>
        </div>
        <form autocomplete="off">
            <div class="modal-footer" style="margin:auto; text-align: center">
                <a type="submit" class="button3" style="font-size: 20px; margin: auto; text-decoration: none" wire:click="confirmPet({{$data['petType']->where('id', $petId)}})">¡Listo!</a>
                <button type="button" class="button4" style="font-size: 20px; margin: auto"  data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>
