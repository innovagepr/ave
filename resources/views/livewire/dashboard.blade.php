{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<x-app-layout>

    @section('title', 'Inicio')

    @section('content')
        <div id="main-content">



        @if(Auth::user()->role_id == 2)
            @livewire('pro-summary')
        @else
            @livewire('child-summary')
        @endif
        </div>



    @endsection


</x-app-layout>

