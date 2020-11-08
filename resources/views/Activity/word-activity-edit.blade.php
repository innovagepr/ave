<html>
@section('title', 'Manejo de Actividades de Palabras')
<link rel="icon" href="{{asset('images/avelogo.ico')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('content')
    <body>
    @livewire('word-activity-management')
    @livewireScripts
    </body>
@endsection
</html>
