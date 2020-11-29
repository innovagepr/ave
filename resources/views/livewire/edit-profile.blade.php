{{-- Because she competes with no one, no one can compete with her. --}}


<div>

{{--    @if($editIcon ===  1)--}}
        <div class="modal fade" id="modalEditIcon" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Editar Ícono') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <div class="flex-col m-auto ">
                            <div style="border: black 1px dashed;">
                                <img class="icon-edit rounded-full" src={{asset($icon)}}/>
                            </div>
                            <div class="flex items-center center pl-2 pt-2">
                                @foreach($icons as $i)
                                    <div class="flex">
                                        <a wire:click="changeIcon($i)"><img class="icon-edit" src="{{asset($i)}}"></a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="closeEditIcon" class="button button1">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                        {{--                    </form>--}}
                        <i type="button" class="close" wire:click.prevent="" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                            <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                        </i>
                    </div>


                </div>
            </div>
        </div>
{{--    @endif--}}


    <div class="main-block-normal pt-8" style="border: black 1px dashed;">
        <div class="flex items-center">
            <div class="flex-col m-auto edit-icon-area">
                <div style="border: black 1px dashed;">
                    <img class="icon-edit rounded-full" src={{asset($icon)}}/>
                </div>
                <div class="flex items-center center pl-2 pt-2">
                    <button wire:click="iconEdit">
                        {{ __('Editar ícono') }}
                    </button>
                </div>

            </div>



            <div class="edit-form" style="border: black 1px dashed;">
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Nombre:') }}" />
                    <x-jet-input class="inline-block w-x-auto" id="first_name" type="text"  name="first" wire:model="first"/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="last_name" value="{{ __('Apellido:') }}" />
                    <x-jet-input class="inline-block w-x-auto" id="last_name" type="text"  wire:model="last" name="last"/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="email" value="{{ __('Email:') }}"  />
                    <x-jet-input class="inline-block w-x-auto" id="email" type="email"  name="email" wire:model="email"/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="password" value="{{ __('Contraseña:') }}" />
                    <x-jet-input class="inline-block w-x-auto" id="password" type="password"  name="dob" placeholder="**********"/>
                </div>
                <div class="flex">
                    <x-jet-label class="pr-2 block text-left" for="dob" value="{{ __('Fecha de Nacimiento:') }}" />
                    <x-jet-input class="inline-block w-x-auto" id="dob" type="date"  name="first_name" wire:model="dob"/>
                </div>

                {{--                @if(auth()->user()->role->slug == 'professional')--}}
                {{--                    <div class="flex">--}}
                {{--                        <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Profesión:') }}" />--}}
                {{--                        <x-jet-input class="inline-block w-1/5" id="first_name" type="text"  name="first_name" value="Maestro"  autofocus/>--}}
                {{--                    </div>--}}
                {{--                @endif--}}
                <div class="mt-4">
                    <button type="submit" class="button button1" wire:click.prevent="updateUser">
                        {{ __('Salvar') }}
                    </button>
                </div>
            </div>
        </div>

    </div>


        <script>
            window.addEventListener('edit-icon', event => {
                $("#modalEditIcon").addClass("fade");
                $("#modalEditIcon").modal('show');
            })
        </script>
        <script>
            window.addEventListener('saved-icon', event => {
                $("#modalEditIcon").modal('hide');
                $("#modalEditIcon").removeClass("fade");
                $(".modal-backdrop").remove();
            })
        </script>
</div>


