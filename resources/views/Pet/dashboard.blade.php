{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

{{--<link rel="stylesheet" href="{{asset('css/activity.css')}}" />--}}

@extends('layouts/app')

@section('title', 'Perfil de Mascota')

@section('content')

    <div>
        <livewire:pet-summary :pet="$pet"/>
    </div>

@endsection


