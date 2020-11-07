<html>
<head>
    <title>{{ __('AVE - Manejar Grupo') }}</title>
</head>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('content')
    <body>
@livewire('group-management')
@livewireScripts
</body>
@endsection
</html>
