<div>
    {{-- Be like water. --}}

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
        <div class="modal fade" id="modalAddStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Añadir Pregunta') }}</p>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Escriba el párrafo de la pregunta a ser añadida:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" rows="5" type="textarea" style="display: inline-block; width:80%; height: 5rem" name="group_name" wire:model="paragraph"/>
                                <div>
                                    @error('paragraph') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Escriba la pregunta asociada al párrafo:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="question"/>
                                <div>
                                    @error('question') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Opción correcta:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="correctOption"/>
                                <div>
                                    @error('correctOption') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Opción incorrecta 1:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="incorrectOption1"/>
                                <div>
                                    @error('incorrectOption1') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Opción incorrecta 2:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="incorrectOption2"/>
                                <div>
                                    @error('incorrectOption2') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-2">
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
        <div class="modal fade" id="modalEditQuestion" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Editar Pregunta') }}</p>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Escriba el párrafo de la pregunta a ser editada:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <input id="group_name" rows="5" type="textarea" style="display: inline-block; width:80%; height: 5rem" name="group_name" wire:model="paragraphToEdit"/>
                                <div>
                                    @error('paragraphToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Escriba la pregunta asociada al párrafo:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="questionToEdit"/>
                                <div>
                                    @error('questionToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Opción correcta:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="correctOptionToEdit"/>
                                <div>
                                    @error('correctOptionToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Opción incorrecta 1:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="incorrectOption1ToEdit"/>
                                <div>
                                    @error('incorrectOption1ToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-0">
                                <x-jet-label for="group_name" value="{{ __('Opción incorrecta 2:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="textarea" style="display: inline-block; width:80%;" name="group_name" wire:model="incorrectOption2ToEdit"/>
                                <div>
                                    @error('incorrectOption2ToEdit') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" wire:click.prevent="editWord()" class="button button1">
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
                                    <x-jet-label for="{{$g->id}}" value="{{ __($g->name) }}" style="display: inline-block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                    <input type="checkbox" wire:model="test.{{ $g }}" value="{{$g->id}}">
                                @endforeach
                            </div>
                            <div class="mt-2">
                                {{ __('Asignar a un estudiante:') }}
                            </div>
                            <div class="mt-2">
                                @foreach($students as $s)
                                    <x-jet-label for="{{$s->fullname}}" value="{{ __($s->fullname) }}" style="display: inline-block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                    <input type="checkbox" wire:model="test2.{{ $s->id }}" value="{{$s->id}}">
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
    @if(($selectedGroup === 0 || $selectedGroup) && $wordToRemove)
        <div class="modal fade" id="modalRemoveWord" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Remover Pregunta') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <p>{{ __('¿Está seguro que quiere remover la pregunta de la lista?') }}</p>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="removeWord()" class="button button1" style="width: 20%">
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
                @if(count($selectedGroup->questions()->get()) >=10)
                    <button class="button button1" href="#" wire:click.prevent="assignListModal()" style="float:right; width: 20%; height: 2%; font-size: 1.2rem;">
                        <i class="fas fa-user-plus"></i>
                        {{ __('Asignar lista') }}
                    </button>
                    @endif
                @endif
            </div>
            <div class="py simple-table align-middle text-center inline-block max-w-5xl sm:px-6 lg:px-8">
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
                                        <x-table.cell> {{ __(count($g->questions()->get())) }} </x-table.cell>
                                            @if($g->groups()->first() === null)
                                                <x-table.cell> {{ __('Ninguno') }}</x-table.cell>
                                            @else
                                                <x-table.cell>
                                                    @foreach($g->groups()->get() as $gs)
                                                        <div>{{ __($gs->name) }}</div>
                                                    @endforeach
                                                    @if($g->users()->first())
                                                        @foreach($g->users()->get() as $gp)
                                                            <div>{{ __($gp->fullname) }}</div>
                                                        @endforeach
                                                    @endif
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
        <div class="flex flex-col" style="margin-top:2%">
            <div class="m-auto mt-7 overflow-x-auto">
                <div class="mt-4">
                    <button class="button button1" href="#" wire:click.prevent="newStudentModal()" style="float:right; width: 40%; height: 2%; font-size: 1.2rem;">
                        <i class="fa fa-plus"></i>
                        {{ __('Añadir pregunta') }}
                    </button>
                </div>
                <div class="py simple-table align-middle text-center inline-block max-w-2xl sm:px-6 lg:px-8">
                    <x-jet-label class="m-auto" style="float:left;">{{ $selectedGroup->name }}</x-jet-label>
                    <x-table>
                        <x-slot name="head">
                            @foreach($headersStudents as $head)
                                <x-table.heading style="position:sticky; top: 0;">{{ __($head) }}</x-table.heading>
                            @endforeach
                        </x-slot>
                        <div style="height:240px;overflow-y:scroll">
                            <x-slot name="body">

                                @foreach($selectedGroup->questions()->get() as $g)
                                    <x-table.row>
                                        <x-table.cell>
                                            <a href="/#" wire:click.prevent="editWordModal({{ $g->id }})" style="text-decoration: none;">{{__($g->paragraph()->first()->text)}}</a>
                                        </x-table.cell>
                                        <x-table.cell>
                                            <a href="#" class="text-danger error">
                                                <span href="#" class="fa fa-trash-alt" wire:click.prevent="removeWordModal({{ $g->id }})"></span>
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
        window.addEventListener('removeListModal', event => {
            $("#modalRemoveList").addClass("fade");
            $("#modalRemoveList").modal('show');
        })
    </script>
    <script>
        window.addEventListener('newStudentModal', event => {
            $("#modalAddStudent").addClass("fade");
            $("#modalAddStudent").modal('show');
        })
    </script>
    <script>
        window.addEventListener('editWordModal', event => {
            $("#modalEditQuestion").addClass("fade");
            $("#modalEditQuestion").modal('show');
        })
    </script>
    <script>
        window.addEventListener('assignListModal', event => {
            $("#modalRegStudent").addClass("fade");
            $("#modalRegStudent").modal('show');
        })
    </script>
    <script>
        window.addEventListener('removeWordModal', event => {
            $("#modalRemoveWord").addClass("fade");
            $("#modalRemoveWord").modal('show');
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
        window.addEventListener('student-added', event => {
            $("#modalAddStudent").modal('hide');
            $("#modalAddStudent").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('word-edited', event => {
            $("#modalEditQuestion").modal('hide');
            $("#modalEditQuestion").removeClass("fade");
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
    <script>
        window.addEventListener('word-removed', event => {
            $("#modalRemoveWord").modal('hide');
            $("#modalRemoveWord").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
</div>
