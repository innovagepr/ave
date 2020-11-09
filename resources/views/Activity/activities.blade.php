@section('title', 'Manejo de Actividades')
@extends('/layouts/app')
@extends('layouts.contactModalLayout')
@section('content')
    <body>
    @livewire('activity-management')
    @livewireScripts
    </body>
@endsection

