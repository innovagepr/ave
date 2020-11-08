<html>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('title', 'Actividad: Comprensión de Lectura')
@section('content')
    <body>
    @livewire('activity2')
    @livewireScripts
    </body>
@endsection
</html>
