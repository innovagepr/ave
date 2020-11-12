<!-- Extending base app layout -->
<x-app-layout>
@section('title', 'Actividad: Comprensión de Lectura')
@section('content')
    <!-- Call for Livewire component to render the view -->
    <body>
    @livewire('activity2')
    @livewireScripts
    </body>
@endsection
</x-app-layout>
