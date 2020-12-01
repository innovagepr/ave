<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <p class="text-center">{{ __('Nueva Lista') }}</p>
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
                            <x-jet-label for="difficulty" value="{{ __('Dificultad:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                            <select id="difficulty" name="difficulty" wire:model="difficulty">
                                <option value="Fácil">{{ __('Fácil') }}</option>
                                <option value="Medio">{{ __('Medio') }}</option>
                                <option value="Difícil">{{ __('Difícil') }}</option>
                            </select>
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
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Editar lista') }}</p>
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
                                <x-jet-label for="difficulty" value="{{ __('Dificultad:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <select id="difficulty" name="difficulty" wire:model="diffToEdit">
                                    <option value="Fácil">{{ __('Fácil') }}</option>
                                    <option value="Medio">{{ __('Medio') }}</option>
                                    <option value="Difícil">{{ __('Difícil') }}</option>
                                </select>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="difficulty" value="{{ __('Activa:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <input type="checkbox" id="difficulty" name="difficulty" wire:model="listActive">
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
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalShowAssigned" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Asignados a Lista') }}</p>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        @if($selectedGroup->groups()->first())
                        <div style="margin: 0 auto; color: #2576AC; font-size: 1.2rem;">
                            <span>{{ __('Grupos') }}</span>
                        </div>
                        <hr>
                        @foreach($selectedGroup->groups()->get() as $gs)

                                <div class="mb-2">{{ __($gs->name) }}</div>
                        @endforeach
                        @endif
                        @if($selectedGroup->users()->first())
                            <div style="margin: 0 auto; color: #2576AC; font-size: 1.2rem;">
                            <span>{{ __('Estudiantes') }}</span>
                            </div>
                        <hr>
                            @foreach($selectedGroup->users()->get() as $gp)
                                <div>{{ __($gp->fullname) }}</div>
                            @endforeach
                        @endif
                            <div class="mb-4">
                                <button type="submit" data-dismiss="modal" class="button button1">
                                    {{ __('Aceptar') }}
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($tableActive)
        <div class="modal fade" id="modalRegStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Asignar Lista') }}</p>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-2">
                                {{ __('Asignar a un grupo:') }}
                            </div>
                            <div class="mt-2">
                                @foreach($groups as $g)
                                    @if($selectedGroup->groups()->where('id', '=', $g->id)->first() === null)
                                    <x-jet-label for="{{$g->id}}" value="{{ __($g->name) }}" style="display: inline-block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                    <input type="checkbox" name="groupList.{{ $g }}" wire:model="groupList" value="{{$g->id}}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-2">
                                {{ __('Asignar a un estudiante:') }}
                            </div>
                            <div class="mt-2">
                                @foreach($students as $s)
                                    @if($s->assignedLists()->where('id', '=', $selectedGroup->id)->first() === null)
                                    <x-jet-label for="{{$s->fullname}}" value="{{ __($s->fullname) }}" style="display: inline-block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                    <input type="checkbox" name="studentList.{{ $s->id }}" wire:model="studentList" value="{{$s->id}}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <button type="submit" wire:click.prevent="assignList()" class="button button1">
                                    {{ __('Añadir') }}
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
    @if($listToRemove)
        <div class="modal fade" id="modalRemoveList" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Remover Lista') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <p>{{ __('¿Está seguro que quiere remover la lista') }} {{ $listToRemove->name }}
                            {{ __('? Éste cambio no se puede revertir.') }}</p>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="removeList()" class="button button1" style="width: 20%">
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
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" wire:click.prevent="newModal()" style="float:right; width: 20%; height: 2%; font-size: 1.2rem;">
                    <i class="fa fa-plus"></i>
                    {{ __('Añadir lista') }}
                </button>
                @if($tableActive)
                <button class="button button1" href="#" wire:click.prevent="editModal()" style="float:right; width: 20%; height: 2%; font-size: 1.2rem;">
                    <i class="fa fa-edit"></i>
                    {{ __('Editar lista') }}
                </button>
                @if(count($selectedGroup->words()->get()) >= 10)
                    <button class="button button1" href="#" wire:click.prevent="assignListModal()" style="float:right; width: 20%; height: 2%; font-size: 1.2rem;">
                        <i class="fas fa-user-plus"></i>
                        {{ __('Asignar lista') }}
                    </button>
                    @endif
                    @endif
            </div>
            <div class="py simple-table align-middle text-center inline-block max-w-5xl sm:px-6 lg:px-8" style="word-wrap: break-word;">
                <x-jet-label class="m-auto" style="float:left;">{{__('Listas')}}</x-jet-label>
                <x-table>
                    <x-slot name="head">
                        @foreach($headersGroups as $head)
                            <x-table.heading style="position:sticky; top: 0;">{{ __($head) }}</x-table.heading>
                        @endforeach
                    </x-slot>
                    <div>
                        <x-slot name="body">

                            @foreach($lists as $g)
                                <x-table.row>
                                    @if($g->name === 'Default')
                                        <x-table.cell>{{__($g->name)}}</x-table.cell>
                                    @else
                                    <x-table.cell>
                                        <a href="/grupos/#" wire:click.prevent="clickGroup({{ $g->id }})" style="text-decoration: none;">{{__($g->name)}}</a>
                                    </x-table.cell>
                                    @endif
                                        <x-table.cell> {{ __($g->difficulty->name) }} </x-table.cell>
                                        <x-table.cell> {{ __(count($g->words()->get())) }} </x-table.cell>
                                    @if($g->groups()->first() === null && $g->users()->first() === null)
                                        <x-table.cell> {{ __('Ninguno') }}</x-table.cell>
                                    @else
                                        <x-table.cell>
                                            <a href="/grupos/#" wire:click.prevent="showAssignedModal({{ $g->id }})" style="text-decoration: none;">{{__('Ver')}}</a>
                                        </x-table.cell>
                                    @endif
                                        @if($g->active === 1)
                                            <x-table.cell>{{__('Sí')}}</x-table.cell>
                                        @else
                                            <x-table.cell>{{__('No')}}</x-table.cell>
                                        @endif
                                    @if($g->name === "Default")
                                        <x-table.cell>{{__(' ')}}</x-table.cell>
                                    @else
                                        <x-table.cell>
                                            <a href="#" class="text-danger">
                                                <span class="fa fa-trash-alt" wire:click.prevent="removeListModal({{ $g->id }})"></span>
                                            </a>
                                        </x-table.cell>
                                    @endif
                                </x-table.row>
                            @endforeach
                        </x-slot>
                    </div>
                </x-table>
                {{ $lists->links() }}
            </div>
        </div>
    </div>
    @if($tableActive)
        @livewire('list-words', ['selectedGroup' => $selectedGroup])
    @endif
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
        window.addEventListener('removeListModal', event => {
            $("#modalRemoveList").addClass("fade");
            $("#modalRemoveList").modal('show');
        })
    </script>
    <script>
        window.addEventListener('assignListModal', event => {
            $("#modalRegStudent").addClass("fade");
            $("#modalRegStudent").modal('show');
        })
    </script>
    <script>
        window.addEventListener('showAssignedModal', event => {
            $("#modalShowAssigned").addClass("fade");
            $("#modalShowAssigned").modal('show');
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
        window.addEventListener('list-removed', event => {
            $("#modalRemoveList").modal('hide');
            $("#modalRemoveList").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>


    <script>
        window.addEventListener('list-assigned', event => {
            $("#modalRegStudent").modal('hide');
            $("#modalRegStudent").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>

</div>
