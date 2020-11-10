<x-app-layout>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@section('title', 'Estadísticas')
@section('content')
    <body>
    @livewire('statistics')
    @livewireScripts
    </body>
@endsection
</x-app-layout>
