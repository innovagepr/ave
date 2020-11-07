<html>
<head>
    <title>{{ __('AVE - Manejar Actividades') }}</title>
</head>
<link rel="icon" href="{{asset('images/avelogo.ico')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('content')
    <body>
    @livewire('activity-management')
    @livewireScripts
    </body>
@endsection
</html>
