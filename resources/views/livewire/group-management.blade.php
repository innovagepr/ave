<div>
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                    <a class="text-center">{{ __('Nuevo grupo') }}</a>
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
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto">
            <div class="mt-4">
                <button class="button button1" href="#" data-toggle="modal" data-target="#modalAdd" style="float:right; width: 205px; height:64px; font-size: 33px; ">
                    {{ __('Añadir') }}
                </button>
            </div>
            <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8" >
                <x-jet-label class="m-auto" style="float:left;">{{__('Grupos')}}</x-jet-label>
                <x-table>
                    <x-slot name="head">
                        @foreach($headersGroups as $head)
                            <x-table.heading>{{ __($head) }}</x-table.heading>
                        @endforeach
                    </x-slot>
                    <x-slot name="body">
                        @foreach($groups as $g)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="/grupos/1">{{__($g['name'])}}</a>
                                </x-table.cell>
                                <x-table.cell>{{__($g['creation-date'])}}</x-table.cell>
                                <x-table.cell>{{__($g['members'])}}</x-table.cell>
                                @if($g['active'] === 0)
                                    <x-table.cell>No</x-table.cell>
                                @else
                                    <x-table.cell>Sí</x-table.cell>
                                @endif
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-table>
            </div>
            <div>
                <p> {{ __('DEBUG: ') }} {{ $name }} {{ $description }}</p>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('group-added', event => {
            $("#modalAdd").removeClass("in");
            $(".modal-backdrop").remove();
            $("#modalAdd").modal('hide');
        })
    </script>
</div>

