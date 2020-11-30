    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
            <div style="margin: 0 auto; color: #2576AC; font-size: 3rem; text-align: center;">
                <span class="text-center">{{ __($student->fullname) }}</span>
            </div>
            <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8" style="margin-top: 10%;">
                <x-table>
                    <x-slot name="head">
                        @foreach($accessHeader as $head)
                            <x-table.heading>{{ __($head) }}</x-table.heading>
                        @endforeach
                    </x-slot>
                    <x-slot name="body">
                        @foreach($accesses as $a)
                            <x-table.row>
                                @if($a->type === 'login')
                                    <x-table.cell> {{ __('Iniciar Sesión') }}</x-table.cell>
                                @else
                                    <x-table.cell> {{ __('Cerrar Sesión') }}</x-table.cell>
                                @endif
                                <x-table.cell> {{ __($a->date) }}</x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-table>
                {{ $accesses->links() }}
            </div>
    </div>

