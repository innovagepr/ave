<html>
<link rel="icon" href="{{asset('images/avelogo.ico')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@section('title', 'Manejo de Actividades')
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('content')
    <body>
    @livewire('activity-management')
    @livewireScripts
    </body>
@endsection
</html>
