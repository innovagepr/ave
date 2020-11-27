<!-- Extending base app layout -->
<x-app-layout>
@section('title', 'Manejo de Actividades')
@section('content')
    <!-- Call for livewire component to render the view -->
    <body>
    @livewire('activity-management')
    @livewireScripts
    </body>
@endsection
</x-app-layout>
