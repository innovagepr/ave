{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

{{--Renders the livewire Pet Summary view--}}
@extends('layouts/app')

@section('title', 'Perfil de Mascota')

@section('content')
    <div>
        <livewire:pet-summary :pet="$pet"/>
    </div>
@endsection


