    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div>
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
        @if(($selectedGroup === 0 || $selectedGroup) && $studentToToggle)
            <div class="modal fade" id="modalToggleStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                            <span class="text-center">{{ __('Estado de Estudiante') }}</span>
                        </div>

                        <div class="modal-body" style="text-align: center;">
                            <p>{{ __('¿Está seguro que quiere') }} {{ __($slot) }} {{ __('al estudiante') }} {{ $studentToToggle->fullname }} {{ __('del grupo? Puede')}} {{ __($altSlot) }}  {{ __('nuevamente si desea.') }}</p>
                            <div class="mt-4">
                                <button type="submit" wire:click.prevent="toggleStudent()" class="button button1" style="width: 20%">
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
                                    @error('dob') <span class="text-danger error">{{ $message }}</span>@enderror
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
        @if($provisionalEmail && $provisionalPassword)
            <div class="modal fade" id="modalStudentRegistered" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                            <span class="text-center">{{ __('Estudiante añadido') }}</span>
                        </div>

                        <div class="modal-body" style="text-align: center;">
                            <p>{{ __('El estudiante ') }} {{ $firstName }} {{ $lastName }} {{ __('ha sido registrado con
                                    la siguiente información provisional: ') }}</p>
                            <div class="mt-4">
                                <div class="mt-4" style="color:#2576AC;">
                                    {{ __('Nombre de Usuario:') }} {{ $provisionalEmail }}
                                </div>
                                <div class="mt-4" style="color: #2576AC;">
                                    {{ __('Contraseña:') }} {{ $provisionalPassword }}
                                </div>
                                <div class="mt-4">
                                    <button type="submit" data-dismiss="modal" class="button button1">
                                        {{ __('Añadir') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    <div class="flex flex-col" style="margin-top:2%">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" wire:click.prevent="newStudentModal()" style="float:right; width: 25%; height: 2%; font-size: 1.2rem;">
                    <i class="fa fa-plus"></i>
                    {{ __('Añadir estudiante') }}
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

                            @foreach($students as $g)
                                    <x-table.row>
                                        <x-table.cell> {{__($g->fullname)}} </x-table.cell>
                                        <x-table.cell>{{__($this->calc_age($g->dob))}} {{ __('años') }}</x-table.cell>
                                        <x-table.cell>{{__($g->level)}}</x-table.cell>
                                        @if($g->active === 0)
                                            <x-table.cell>
                                                <a href="/#" wire:click.prevent="toggleStudentModal({{ $g->id }})" style="text-decoration: none;">No</a>
                                            </x-table.cell>
                                        @else
                                            <x-table.cell>
                                                <a href="/#" wire:click.prevent="toggleStudentModal({{ $g->id }})" style="text-decoration: none;">Sí</a>
                                            </x-table.cell>
                                        @endif
                                        @if($g->loginRecords()->where('type','=', 'login')->latest()->first())
                                            <x-table.cell>{{$g->loginRecords()->where('type','=', 'login')->latest()->first()->date}}</x-table.cell>
                                        @else
                                            <x-table.cell>Ninguno</x-table.cell>
                                        @endif
                                        <x-table.cell>
                                            <a href="#" class="text-danger">
                                                <span href="#" class="fa fa-trash-alt" wire:click.prevent="removeStudentModal({{ $g->id }})"></span>
                                            </a>
                                        </x-table.cell>
                                    </x-table.row>
                            @endforeach
                        </x-slot>
                    </div>
                </x-table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
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
            window.addEventListener('toggleStudentModal', event => {
                $("#modalToggleStudent").addClass("fade");
                $("#modalToggleStudent").modal('show');
            })
        </script>
        <script>
            window.addEventListener('removeStudentModal', event => {
                $("#modalRemoveStudent").addClass("fade");
                $("#modalRemoveStudent").modal('show');
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
                $("#modalRegStudent").toggle();
                $("#modalStudentRegistered").addClass("fade");
                $("#modalStudentRegistered").modal('show');
            })
        </script>
        <script>
            window.addEventListener('student-toggled', event => {
                $("#modalToggleStudent").modal('hide');
                $("#modalToggleStudent").removeClass("fade");
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
