<html>
<head>
    <title>{{ __('AVE - Manejar Actividades de Palabras') }}</title>
</head>
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
