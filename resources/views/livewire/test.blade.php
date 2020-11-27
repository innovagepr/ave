<div>

    {{-- In work, do what you enjoy. --}}
    <input wire:model="name" type="text">
    <form wire:submit.prevent="submitGroup()">
        <label for="name">Group name:</label><br>
        <input type="text" id="name" name="name" wire:model="name" value="Grupo n"><br>
        <label for="creation-date">Creation Date:</label><br>
        <input type="text" id="creation-date" name="creation-date" wire:model="creationdate" value="4/noviembre/2020"><br><br>
        <label for="members">Amount of members:</label><br>
        <input type="text" id="members" name="members" wire:model="members" value="0"><br><br>
        <label for="active">Active Status:</label><br>
        <input type="text" id="active" name="active" wire:model="active" value="0"><br><br>
        <input type="submit" value="Submit">
    </form>

    <x-jet-label class="m-auto">{{__('Grupos')}} {{ $name }}</x-jet-label>
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
