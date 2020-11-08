{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
{{--<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>--}}

<link rel="stylesheet" href="{{asset('css/activity.css')}}" />

@extends('layouts/app')
@extends('layouts/immediateResultModal')

@section('title', 'Actividad: Ordena la Palabra')

@section('content')

{{--    <head>--}}
{{--        <livewire:steps-bar/>--}}
{{--    </head>--}}


    <div>
{{--        <livewire:letter-display :word="$word"/>--}}
        <livewire:letter-display :words="$words"/>
    </div>

@endsection


