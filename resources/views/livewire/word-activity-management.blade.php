<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <a class="text-center">{{ __('Nueva Lista') }}</a>
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
                        <a class="text-center">{{ __('Editar grupo') }}</a>
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
        <div class="modal fade" id="modalAddStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <a class="text-center">{{ __('Añadir Estudiante') }}</a>
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
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalRegStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <a class="text-center">{{ __('Añadir Estudiante') }}</a>
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
                                <x-jet-label for="group_name" value="{{ __('Edad:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="age"/>
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
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" wire:click.prevent="newModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                    <i class="fa fa-plus"></i>
                    {{ __('Añadir') }}
                </button>
            </div>
            <div class="py simple-table align-middle text-center inline-block max-w-5xl sm:px-6 lg:px-8" style="overflow-y: scroll; height: 300px;">
                <x-jet-label class="m-auto" style="float:left;">{{__('Listas')}}</x-jet-label>
                <x-table>
                    <x-slot name="head">
                        @foreach($headersGroups as $head)
                            <x-table.heading style="position:sticky; top: 0;">{{ __($head) }}</x-table.heading>
                        @endforeach
                    </x-slot>
                    <div>
                        <x-slot name="body">

                            @foreach($groups as $g)
                                @if($g['deleted'] === 0)
                                <x-table.row>
                                    @if($g['name'] === 'Default')
                                        <x-table.cell>{{__($g['name'])}}</x-table.cell>
                                    @else
                                    <x-table.cell>
                                        <a href="/grupos/#" wire:click.prevent="clickGroup({{ $g['id'] }})" style="text-decoration: none;">{{__($g['name'])}}</a>
                                    </x-table.cell>
                                    @endif
                                    <x-table.cell>{{__($g['difficulty'])}}</x-table.cell>
                                    <x-table.cell>{{__($g['quantity'])}}</x-table.cell>
                                    <x-table.cell>{{__($g['group'])}}</x-table.cell>
                                    @if($g['active'] === 0)
                                        <x-table.cell>No</x-table.cell>
                                    @else
                                        <x-table.cell>Sí</x-table.cell>
                                    @endif
                                    @if($g['name'] === "Default")
                                        <x-table.cell>{{__(' ')}}</x-table.cell>
                                    @else
                                        <x-table.cell>
                                            <a href="#" class="text-danger">
                                                <span class="fa fa-trash-alt" wire:click.prevent="removeGroup({{ $g['id'] }})"></span>
                                            </a>
                                        </x-table.cell>
                                    @endif
                                </x-table.row>
                                @endif
                            @endforeach

                        </x-slot>
                    </div>
                </x-table>
            </div>
        </div>
    </div>
    @if($tableActive)
        <div class="flex flex-col">
            <div class="m-auto mt-7 overflow-x-auto">
                <div class="mt-4">
                    <button class="button button1" href="#" wire:click.prevent="newStudentModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                        <i class="fa fa-plus"></i>
                        {{ __('Añadir') }}
                    </button>
                    <button class="button button1" href="#" wire:click.prevent="editModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                        <i class="fa fa-edit"></i>
                        {{ __('Editar') }}
                    </button>
                    <button class="button button1" href="#" wire:click.prevent="editModal()" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                        {{ __('Asignar') }}
                    </button>
                </div>
                <div class="py simple-table align-middle text-center inline-block max-w-2xl sm:px-6 lg:px-8" style="overflow-y: scroll; height: 300px;">
                    <x-jet-label class="m-auto" style="float:left;">{{ $groups[$selectedGroup]['name'] }}</x-jet-label>
                    <x-table>
                        <x-slot name="head">
                            @foreach($headersStudents as $head)
                                <x-table.heading style="position:sticky; top: 0;">{{ __($head) }}</x-table.heading>
                            @endforeach
                        </x-slot>
                        <div style="height:240px;overflow-y:scroll">
                            <x-slot name="body">

                                @foreach($groupStudents as $g)
                                    <x-table.row>
                                        <x-table.cell>{{__($g['word'])}}</x-table.cell>
                                        @if($g['active'] === 0)
                                            <x-table.cell>No</x-table.cell>
                                        @else
                                            <x-table.cell>Sí</x-table.cell>
                                        @endif
                                        <x-table.cell>
                                            <a href="#" class="text-danger error">
                                                <span href="#" class="fa fa-trash-alt" wire:click.prevent="deleteGroup({{ $g['id'] }}})"></span>
                                            </a>
                                        </x-table.cell>
                                    </x-table.row>
                                @endforeach

                            </x-slot>
                        </div>
                    </x-table>
                </div>
            </div>
        </div>

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
        window.addEventListener('newStudentModal', event => {
            $("#modalAddStudent").addClass("fade");
            $("#modalAddStudent").modal('show');
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
</div>