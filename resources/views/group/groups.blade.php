<!-- Extending base app layout -->
<x-app-layout>

    @section('title', 'Manejo de Grupos')
    @section('content')
        <body>
        <!-- Call for Livewire component to render the view -->
        @if(auth()->user()->role_id === 1)
            @livewire('group-management')
        @else
            <script>window.location = "/dashboard";</script>
        @endif

        </body>
    @endsection
</x-app-layout>
