
<div>
    @if($selectedStudent)
        <div class="modal fade" id="modalAccessStudent" tabindex="-1" role="dialog"  aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    @livewire('student-accesses', ['selectedStudent' => $selectedStudent])
                    <button type="submit" data-dismiss="modal" wire:click.prevent="resetOnClose()" class="button button1">
                        {{ __('Aceptar') }}
                    </button>
                </div>
            </div>
        </div>
    @endif
    @if($chartActive)
            <div class="container">
                <x-jet-label class="m-auto block">{{ __('Accesos por mes') }}</x-jet-label>
                <div id="stocks-chart"></div>
                <?= Lava::render('LineChart', 'MyStocks', 'stocks-chart'); ?>

            </div>
        @endif
    {{-- Stop trying to control. --}}
    <div class="flex flex-col" style="margin-top:2%">
            <div class="py simple-table align-middle text-center inline-block max-w-5xl sm:px-6 lg:px-8" style="height: 300px;">
                <x-jet-label class="m-auto" style="float:left;">{{ $group->name }}</x-jet-label>
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
                                            <x-table.cell> {{ __($g->fullname) }}</x-table.cell>
                                            <x-table.cell>
                                                <a href="/#" wire:click.prevent="studentAccessModal({{ $g->id }})" style="text-decoration: none;">{{__('Ver')}}</a>
                                            </x-table.cell>
                                        </x-table.row>
                                    @endforeach
                                </x-slot>
                            </div>
                </x-table>
                {{ $students->links() }}
            </div>
        </div>
<script>
    window.addEventListener('studentAccessModal', event => {
        $("#modalAccessStudent").addClass("fade");
        $("#modalAccessStudent").modal('show');
    })
    window.google.charts.load('46', {packages: ['corechart']});
</script>
</div>
