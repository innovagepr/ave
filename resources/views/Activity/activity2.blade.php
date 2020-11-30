<!-- Extending base app layout -->
<x-app-layout>
@section('title', 'Actividad: Comprensión de Lectura')
@section('content')
    <!-- Call for Livewire component to render the view -->
    <body>
    <div>
        <livewire:activity2 :activity="$questions"/>
    </div>
    </body>
@endsection
</x-app-layout>
