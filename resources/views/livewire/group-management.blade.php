<div>
    <!-- Modal for adding a new group -->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <span class="text-center">{{ __('Nuevo grupo') }}</span>
                </div>

                <div class="modal-body" style="text-align: center;">
                    <form>
                        <div class="mt-2">
                            <x-jet-label for="group_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                            <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="name"/>
                            <div>
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-0">
                            <x-jet-label for="description" value="{{ __('Descripción:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                            <x-jet-input id="description" type="text" style="display: inline-block; width:80%; height: 5rem" name="description" wire:model="description"/>
                            <div>
                                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="submitGroup()" class="button button1">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </form>
                    <i type="button" class="close" wire:click.prevent="resetOnClose()" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                        <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                    </i>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal for editing a group. Only works if a group is selected. -->
    @if($selectedGroup === 0 || $selectedGroup)
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <span class="text-center">{{ __('Editar grupo') }}</span>
                </div>

                <div class="modal-body" style="text-align: center;">
                    <form>
                        <div class="mt-2">
                            <x-jet-label for="group_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                            <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="nameToEdit"/>
                            <div>
                                @error('nameToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mt-0">
                            <x-jet-label for="description" value="{{ __('Descripción:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                            <x-jet-input id="description" type="text" style="display: inline-block; width:80%; height: 5rem" name="description" wire:model="descToEdit"/>
                            <div>
                                @error('descToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="mt-0">
                            <x-jet-label for="description" value="{{ __('Activo:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                            <input id="groupActive" type="checkbox" style="display: inline-block; width:80%; height: 5rem" name="groupActive" wire:model="groupActive">
                            <div>
                                @error('descToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="editGroup()" class="button button1">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </form>
                    <i type="button" class="close" wire:click.prevent="resetOnClose()" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                        <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                    </i>
                </div>


            </div>
        </div>
    </div>
    @endif


    @if($groupToRemove)
        <div class="modal fade" id="modalRemoveGroup" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Remover Grupo') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <p>{{ __('¿Está seguro que quiere remover el grupo') }} {{ $groupToRemove->name }}
                            {{ __('? Éste cambio no se puede revertir.') }}</p>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="removeGroup()" class="button button1" style="width: 20%">
                                {{ __('Sí') }}
                            </button>
                            <button type="submit" wire:click.prevent="resetOnClose()" data-dismiss="modal" aria-label="Close" class="button button1" style="width: 20%">
                                {{ __('No') }}
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endif

<!-- Main table containing all groups present -->
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" wire:click.prevent="newModal()" style="float:right; width: 20%; height: 2%; font-size: 1.2rem;">
                    <i class="fa fa-plus"></i>
                    {{ __('Añadir grupo') }}
                </button>
                @if($tableActive)
                    <button class="button button1" href="#" wire:click.prevent="editModal()" style="float:right; width: 20%; height: 2%; font-size: 1.2rem;">
                        <i class="fa fa-edit"></i>
                        {{ __('Editar grupo') }}
                    </button>
                @endif

            </div>
            <div class="py simple-table align-middle text-center text-justify inline-block max-w-5xl sm:px-6 lg:px-8" style="height: 300px;">
                <x-jet-label class="m-auto text-left">{{__('Grupos')}}</x-jet-label>
                <x-table>
                    <x-slot name="head">
                        @foreach($headersGroups as $head)
                            <x-table.heading>{{ __($head) }}</x-table.heading>
                        @endforeach
                    </x-slot>
                    <div>
                    <x-slot name="body">

                    @foreach($groups as $g)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="/#" wire:click.prevent="clickGroup({{ $g->id }})" style="text-decoration: none;">{{__($g->name)}}</a>
                                </x-table.cell>
                                <x-table.cell>{{__($g->date_created)}}</x-table.cell>
                                <x-table.cell>{{__(count($g->members()->get()))}}</x-table.cell>
                                @if($g->active === 1)
                                    <x-table.cell>{{__('Sí')}}</x-table.cell>
                                @else
                                    <x-table.cell>{{__('No')}}</x-table.cell>
                                @endif
                                <x-table.cell>
                                    <a href="#" class="text-danger">
                                        <span class="fa fa-trash-alt" wire:click.prevent="removeGroupModal({{ $g->id }})"></span>
                                    </a>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                    </div>
                </x-table>
                {{ $groups->links() }}
            </div>
        </div>
    </div>
    <!-- Table for students in a group. Shows when a group is selected. -->
    @if($tableActive)
        @livewire('student-list', ['selectedGroup' => $selectedGroup])
    @endif
<!-- Event listeners for opening modals. -->
    <script>
        window.addEventListener('newModal', event => {
            $("#modalAdd").addClass("fade");
            $("#modalAdd").modal('show');
        })
    </script>
    <script>
        window.addEventListener('editModal', event => {
            $("#modalEdit").addClass("fade");
            $("#modalEdit").modal('show');
        })
    </script>
    <script>
        window.addEventListener('removeGroupModal', event => {
            $("#modalRemoveGroup").addClass("fade");
            $("#modalRemoveGroup").modal('show');
        })
    </script>
    <script>
        window.addEventListener('group-added', event => {
            $("#modalAdd").modal('hide');
            $("#modalAdd").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('group-edited', event => {
            $("#modalEdit").modal('hide');
            $("#modalEdit").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('group-removed', event => {
            $("#modalRemoveGroup").modal('hide');
            $("#modalRemoveGroup").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
</div>

