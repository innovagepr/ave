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
<!-- Modal for adding a student to a group. Only works if a group is selected. -->
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalAddStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Añadir Estudiante') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-2">
                                <x-jet-label for="group_name" value="{{ __('Escriba el correo electrónico del estudiante:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="email"/>
                                <div>
                                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="mt-0">
                                <p>{{ __('o') }}</p>
                            </div>
                            <div class="mt-0">
                                <a href="#" wire:click="regStudentModal()" data-dismiss="modal">{{ __('Crear un nuevo estudiante en el sistema') }}</a>
                            </div>
                            <div class="mt-4">
                                <button type="submit" wire:click.prevent="addStudent()" class="button button1">
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

    @if(($selectedGroup === 0 || $selectedGroup) && $studentToRemove)
        <div class="modal fade" id="modalRemoveStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Remover Estudiante') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <p>{{ __('¿Está seguro que quiere remover al estudiante') }} {{ $studentToRemove->fullname }} {{ __('del grupo? Puede añadirlo nuevamente si recuerda
                                el correo electrónico atado a su cuenta.') }}</p>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="removeStudent()" class="button button1" style="width: 20%">
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

<!-- Modal for adding a new student account and appending it to a group. Only works if a group is selected. -->
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalRegStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Registrar Estudiante') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-2">
                                <x-jet-label for="group_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="firstName"/>
                                <div>
                                    @error('firstName') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-jet-label for="group_name" value="{{ __('Apellido:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="lastName"/>
                                <div>
                                    @error('lastName') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-jet-label for="dob" value="{{ __('Edad:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="dob" type="date" style="display: inline-block; width:80%;" name="dob" wire:model="dob"/>
                                <div>
                                    @error('age') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-jet-label for="group_name" value="{{ __('Correo Electrónico:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="email"/>
                                <div>
                                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" wire:click.prevent="registerStudent()" class="button button1">
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
<!-- Main table containing all groups present -->
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <span> {{ __('DEBUG: ') }}{{auth()->user()->id}} {{$tempDate }} {{ $students }}</span>
                <button class="button button1" href="#" wire:click.prevent="newModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                    <i class="fa fa-plus"></i>
                    {{ __('Añadir') }}
                </button>
                @if($tableActive)
                    <button class="button button1" href="#" wire:click.prevent="editModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                        <i class="fa fa-edit"></i>
                        {{ __('Editar') }}
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
                                <x-table.cell>
                                    <a href="#" class="text-danger">
                                        <span class="fa fa-trash-alt" wire:click.prevent="removeGroupModal({{ $g['id'] }})"></span>
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
        <div class="flex flex-col">
            <div class="m-auto mt-7 overflow-x-auto">
                <div class="mt-4">
                    <button class="button button1" href="#" wire:click.prevent="newStudentModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                        <i class="fa fa-plus"></i>
                        {{ __('Añadir') }}
                    </button>
                </div>
                <div class="py simple-table align-middle text-center inline-block max-w-5xl sm:px-6 lg:px-8" style="height: 300px;">
                    <x-jet-label class="m-auto" style="float:left;">{{ $selectedGroup->name }}</x-jet-label>
                    <x-table>
                        <x-slot name="head">
                            @foreach($headersStudents as $head)
                                <x-table.heading>{{ __($head) }}</x-table.heading>
                            @endforeach
                        </x-slot>
                        <div style="height:240px;overflow-y:scroll">
                            <x-slot name="body">

                                @foreach($selectedGroup->members as $g)
                                    @if($g->active === 1)
                                    <x-table.row>
                                        <x-table.cell>{{__($g->fullname)}}</x-table.cell>
                                        <x-table.cell>{{__($g->dob)}}</x-table.cell>
                                        <x-table.cell>{{__($g->level)}}</x-table.cell>
                                        @if($g->active === 0)
                                            <x-table.cell>No</x-table.cell>
                                        @else
                                            <x-table.cell>Sí</x-table.cell>
                                        @endif
                                        <x-table.cell>
                                            <a href="#" class="text-danger">
                                                <span href="#" class="fa fa-trash-alt" wire:click.prevent="removeStudentModal({{ $g->id }})"></span>
                                            </a>
                                        </x-table.cell>
                                    </x-table.row>
                                    @endif
                                @endforeach
                            </x-slot>
                        </div>
                    </x-table>
                </div>
            </div>
        </div>
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
        window.addEventListener('newStudentModal', event => {
            $("#modalAddStudent").addClass("fade");
            $("#modalAddStudent").modal('show');
        })
    </script>
    <script>
        window.addEventListener('regModal', event => {
            $("#modalRegStudent").addClass("fade");
            $("#modalRegStudent").modal('show');
        })
    </script>
    <script>
        window.addEventListener('removeStudentModal', event => {
            $("#modalRemoveStudent").addClass("fade");
            $("#modalRemoveStudent").modal('show');
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
    <script>
        window.addEventListener('student-added', event => {
            $("#modalAddStudent").modal('hide');
            $("#modalAddStudent").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('student-registered', event => {
            $("#modalRegStudent").modal('hide');
            $("#modalRegStudent").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('student-removed', event => {
            $("#modalRemoveStudent").modal('hide');
            $("#modalRemoveStudent").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
</div>

