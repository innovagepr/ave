<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalAddQuestion" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
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
                                <button type="submit" wire:click.prevent="addQuestion()" class="button button1">
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
                                <button type="submit" wire:click.prevent="editQuestion()" class="button button1">
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
    @if(($selectedGroup === 0 || $selectedGroup) && $questionToRemove)
        <div class="modal fade" id="modalRemoveQuestion" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Remover Pregunta') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <p>{{ __('¿Está seguro que quiere remover la pregunta de la lista?') }}</p>
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="removeQuestion()" class="button button1" style="width: 20%">
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
    <div class="flex flex-col" style="margin-top:2%">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" wire:click.prevent="newQuestionModal()" style="float:right; width: 40%; height: 2%; font-size: 1.2rem;">
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

                            @foreach($questions as $g)
                                <x-table.row>
                                    <x-table.cell>
                                        <a href="/#" wire:click.prevent="editQuestionModal({{ $g->id }})" style="text-decoration: none;">{{__($g->paragraph()->first()->text)}}</a>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <a href="#" class="text-danger error">
                                            <span href="#" class="fa fa-trash-alt" wire:click.prevent="removeQuestionModal({{ $g->id }})"></span>
                                        </a>
                                    </x-table.cell>
                                </x-table.row>
                            @endforeach

                        </x-slot>
                    </div>
                </x-table>
                {{ $questions->links() }}
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('newQuestionModal', event => {
            $("#modalAddQuestion").addClass("fade");
            $("#modalAddQuestion").modal('show');
        })
    </script>
    <script>
        window.addEventListener('question-added', event => {
            $("#modalAddQuestion").modal('hide');
            $("#modalAddQuestion").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('editQuestionModal', event => {
            $("#modalEditQuestion").addClass("fade");
            $("#modalEditQuestion").modal('show');
        })
    </script>
    <script>
        window.addEventListener('question-edited', event => {
            $("#modalEditQuestion").modal('hide');
            $("#modalEditQuestion").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('removeQuestionModal', event => {
            $("#modalRemoveQuestion").addClass("fade");
            $("#modalRemoveQuestion").modal('show');
        })
    </script>
    <script>
        window.addEventListener('question-removed', event => {
            $("#modalRemoveQuestion").modal('hide');
            $("#modalRemoveQuestion").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
</div>
