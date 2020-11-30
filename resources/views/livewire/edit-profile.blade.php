{{-- Because she competes with no one, no one can compete with her. --}}


<div>
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
                        <div class="flex items-center center pl-2 pt-2 m-auto">
                            @foreach($icons as $i=>$link)
                                @if($icon === $link)
                                    <div class="flex">
                                        <button wire:click="changeIcon({{$i}})" disabled><img class="icon-edit" style="opacity: 0.2; cursor: not-allowed;" src="{{asset($link)}}"></button>
                                    </div>
                                @else
                                    <div class="flex">
                                        <button wire:click="changeIcon({{$i}})"><img class="icon-edit" src="{{asset($link)}}"></button>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="mt-4">
                        <button type="submit" wire:click.prevent="closeEditIcon" class="button button1">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                    <i type="button" class="close" wire:click.prevent="" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                        <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                    </i>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConfirmSave" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <div class="flex-col m-auto ">
                        <h3>La información del perfil ha sifo modifcada exitosamente.</h3>
                    </div>
                    <div class="mt-4">
                        <button type="submit" wire:click.prevent="closeConfirm" class="button button1">
                            {{ __('Continuar') }}
                        </button>
                    </div>
                    <i type="button" class="close" wire:click.prevent="" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                        <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                    </i>
                </div>
            </div>
        </div>
    </div>


    <div class="main-block-normal pt-8 mt-10">
        <div class="flex-col m-auto">
            <div class="flex items-center">
                <div class="flex-col edit-icon-area">
                    <div class=" inline-block m-auto">
                        <img class="rounded-full" src={{asset($icon)}}/>
                    </div>
                    <div class="flex items-center pl-2 pt-2">
                        <button wire:click="iconEdit">
                            {{ __('Editar ícono') }}
                        </button>
                    </div>

                </div>
                <div class="edit-form">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <x-jet-label class="pr-2 block text-left" for="first_name" value="{{ __('Nombre:') }}" />
                            </td>
                            <td>
                                <x-jet-input class="inline-block w-x-auto" id="first_name" type="text"  name="first" wire:model="first"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-jet-label class="pr-2 block text-left" for="last_name" value="{{ __('Apellido:') }}" />
                            </td>
                            <td>
                                <x-jet-input class="inline-block w-x-auto" id="last_name" type="text"  wire:model="last" name="last"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-jet-label class="pr-2 block text-left" for="email" value="{{ __('Email:') }}"  />
                            </td>
                            <td>
                                <x-jet-input class="inline-block w-x-auto" id="email" type="email"  name="email" wire:model="email"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-jet-label class="pr-2 block text-left" for="password" value="{{ __('Contraseña:') }}" />
                            </td>
                            <td>
                                <x-jet-input class="inline-block w-x-auto" disabled id="password" type="password"  name="dob" placeholder="**********"/>
                            </td>
                            <td>
                                <a>
                                    <span class="fa fa-edit"></span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <x-jet-label class="pr-2 block text-left" for="dob" value="{{ __('Fecha de Nacimiento:') }}" />
                            </td>
                            <td>
                                <x-jet-input class="inline-block w-x-auto" id="dob" type="date"  name="first_name" wire:model="dob"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="center">
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
    <script>
        window.addEventListener('finish-edit', event => {
            $("#modalConfirmSave").addClass("fade");
            $("#modalConfirmSave").modal('show');
        })
    </script>
    <script>
        window.addEventListener('finish-edit-close', event => {
            $("#modalConfirmSave").modal('hide');
            $("#modalConfirmSave").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
</div>


