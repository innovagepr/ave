    {{-- Care about people's approval and you will be their prisoner. --}}
    <div>
        <div class="flex flex-col">
            <div class="m-auto mt-7 overflow-x-auto ">
                <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8" style="margin-top: 10%;">
                    <x-jet-label class="m-auto">{{__('Actividades')}}</x-jet-label>
                    <x-table>
                        <x-slot name="head">
                            @foreach($headersActivities as $head)
                                <x-table.heading>{{ __($head) }}</x-table.heading>
                            @endforeach
                        </x-slot>
                        <x-slot name="body">
                            @foreach($activities as $a)
                                <x-table.row>
                                    <x-table.cell> {{__($a['activity'])}} </x-table.cell>
                                    @if($a['activity'] === 'Palabras')
                                    <x-table.cell>
                                        <a href="/manejoActividades/palabras">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    </x-table.cell>
                                        @endif
                                    @if($a['activity'] === 'Lectura')
                                        <x-table.cell>
                                            <a href="/manejoActividades/lectura">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                        </x-table.cell>
                                        @endif
                                </x-table.row>
                            @endforeach
                        </x-slot>
                    </x-table>
                    </div>
                </div>
            </div>
        </div>
