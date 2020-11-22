<!-- Extending base app layout -->
<x-app-layout>
@section('title', 'Actividad: Comprensión de Lectura')
@section('content')
    <!-- Call for Livewire component to render the view -->
    <body>
    @if(auth()->user()->role_id === 2)
        @livewire('activity2')
        @livewireScripts
    @else
        <script>window.location = "/dashboard";</script>
    @endif
    </body>
@endsection
</x-app-layout>
