<!-- Extending base app layout -->
<x-app-layout>
    @section('title', 'Manejo de Grupos')
    @section('content')
        <body>
        <!-- Call for Livewire component to render the view -->
        @livewire('group-management')
        </body>
    @endsection
</x-app-layout>
