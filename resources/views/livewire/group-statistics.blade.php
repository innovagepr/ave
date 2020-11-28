<div>
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
                                            <x-table.cell> {{ __('Ver') }}</x-table.cell>
                                        </x-table.row>
                                    @endforeach
                                </x-slot>
                            </div>
                </x-table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
