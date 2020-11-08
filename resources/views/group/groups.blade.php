<html>
@section('title', 'Manejo de Grupos')
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
