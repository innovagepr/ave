{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
<meta charset="UTF-8"/>
@extends('layouts/app')
@section('title', 'Actividad: Ordena la Palabra')
@section('content')

    <div>
        <livewire:letter-display :words="$words" :user="$user" :list="$list"/>
    </div>

@endsection


