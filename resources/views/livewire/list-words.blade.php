<div>
    {{-- The whole world belongs to you --}}
    @if($selectedGroup === 0 || $selectedGroup)
        <div class="modal fade" id="modalAddWord" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Añadir Palabra') }}</p>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-2">
                                <x-jet-label for="group_name" value="{{ __('Escriba la palabra a ser añadida:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="word"/>
                                <div>
                                    @error('word') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" wire:click.prevent="addWord()" class="button button1">
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
        <div class="modal fade" id="modalEditWord" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <p class="text-center">{{ __('Editar Palabra') }}</p>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <form>
                            <div class="mt-2">
                                <x-jet-label for="group_name" value="{{ __('Escriba la palabra a ser editada:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                                <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" wire:model="word"/>
                                <div>
                                    @error('word') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" wire:click.prevent="editWord()" class="button button1">
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
    @if(($selectedGroup === 0 || $selectedGroup) && $wordToRemove)
        <div class="modal fade" id="modalRemoveWord" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                        <span class="text-center">{{ __('Remover Palabra') }}</span>
                    </div>

                    <div class="modal-body" style="text-align: center;">
                        <p>{{ __('¿Está seguro que quiere remover la palabra') }} {{ $wordToRemove->word }} {{ __('de la lista?') }}</p>
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
    <div class="flex flex-col" style="margin-top:2%">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" wire:click.prevent="newWordModal()" style="float:right; width: 40%; height: 2%; font-size: 1.2rem;">
                    <i class="fa fa-plus"></i>
                    {{ __('Añadir palabra') }}
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

                            @foreach($words as $g)
                                <x-table.row>
                                    <x-table.cell>
                                        <a href="/#" wire:click.prevent="editWordModal({{ $g->id }})" style="text-decoration: none;">{{__($g->word)}}</a>
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
                {{ $words->links() }}
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('newWordModal', event => {
            $("#modalAddWord").addClass("fade");
            $("#modalAddWord").modal('show');
        })
    </script>
    <script>
        window.addEventListener('word-added', event => {
            $("#modalAddWord").modal('hide');
            $("#modalAddWord").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('editWordModal', event => {
            $("#modalEditWord").addClass("fade");
            $("#modalEditWord").modal('show');
        })
    </script>
    <script>
        window.addEventListener('word-edited', event => {
            $("#modalEditWord").modal('hide');
            $("#modalEditWord").removeClass("fade");
            $(".modal-backdrop").remove();
        })
    </script>
    <script>
        window.addEventListener('removeWordModal', event => {
            $("#modalRemoveWord").addClass("fade");
            $("#modalRemoveWord").modal('show');
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
