<html>
<head>
    <title>{{ __('AVE - Actividad 2') }}</title>
</head>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('content')
    <body>
    @livewire('activity2')
    @livewireScripts
    </body>
@endsection
</html>
