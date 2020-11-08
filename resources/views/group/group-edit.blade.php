{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('images/avelogo.ico')}}">

@php
    $headersGroups = array("Nombre", "Fecha de creación", "Cantidad de miembros", "Activo");
    $groups = array(array("id"=> 1, "name" => "Grupo 1", "creation-date" => "10/septiembre/2020", "members" =>4, "active"=> 1, "description" => "Grupo de tutorías martes y jueves 4pm a 6pm"),
                    array("id"=> 2, "name" => "Grupo 2", "creation-date" =>"1/septiembre/2020", "members" =>4, "active" => 0));
    $headersStudents = array("Nombre", "Edad", "Nivel", "Ultimo Acceso", "Activo");
    $students = array(array("name" => "Miguel Rivera", "age" => 8, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1),
                      array("name" => "Laura Perez", "age" => 10, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 0),
                      array("name" => "María Vázquez", "age" => 8, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1),
                      array("name" => "Pedro Colón", "age" => 9, "level" => "Nivel 2", "last-access" => "10/octubre/2020", "active" => 1));
@endphp

@extends('/layouts/app')
<head>
    <title>{{ __('AVE - Editar Grupo') }}</title>
    <style>
        html{
            overflow-x: hidden;
            box-sizing: border-box;
            padding: 0px;
        }
    </style>
</head>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                <a class="text-center">Nuevo grupo</a>
            </div>
            <div class="modal-body" style="text-align: center;">
                <div class="mt-2">
                    <x-jet-label for="group_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                    <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" required autofocus autocomplete="group_name" />
                </div>

                <div class="mt-0">
                    <x-jet-label for="description" value="{{ __('Descripción:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                    <x-jet-input id="description" type="text" style="display: inline-block; width:80%; height: 5rem" name="description" required autofocus autocomplete="description" />
                </div>
                <div class="mt-4">
                    <button class="button button1" data-toggle="modal" href="#modalAddNew" data-dismiss="modal">
                        {{ __('Salvar') }}
                    </button>
                </div>
                <i type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                    <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                </i>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddNew" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="margin: 0 auto; color: #2576AC; font-size: 3rem;">
                <a class="text-center">Nuevo grupo</a>
            </div>
            <div class="modal-body" style="text-align: center;">
                <div class="mt-2">
                    <x-jet-label for="group_name" value="{{ __('Nombre:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                    <x-jet-input id="group_name" type="text" style="display: inline-block; width:80%;" name="group_name" required autofocus autocomplete="group_name" />
                </div>

                <div class="mt-0">
                    <x-jet-label for="description" value="{{ __('Descripción:') }}" style="display: block; text-align: left; font-size: 1rem; font-weight: normal; padding-left: 10%; color: #050404;" />
                    <x-jet-input id="description" type="text" style="display: inline-block; width:80%; height: 5rem" name="description" required autofocus autocomplete="description" />
                </div>
                <div class="mt-4">
                    <button class="button button1" data-dismiss="modal">
                        {{ __('Salvar') }}
                    </button>
                </div>
                <i type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left; cursor: pointer; color: #8F8F8F;">
                    <span class="fa fa-arrow-alt-circle-left fa-2x"></span>
                </i>
            </div>
        </div>
    </div>
</div>

{{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">--}}
<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/styles.css')}}" />
<body style="background-color:#E5FCFB; font-family: 'Berlin Sans FB';  overflow-x: hidden">
@section('content')
    <div class="mt-2">
        <a style="color: #2576AC; font-size: 2rem; padding-left: 10%; padding-top:20%;">{{ __($groups[0]['name']) }}</a>
    </div>
    <div class="mt-2">
        <x-jet-label for="first_name" value="{{ __('Descripción:') }}" style="display: block; text-align: left; padding-left: 10%;" />
        <x-jet-input id="first_name" type="text" style="display: block; width:40%; height: 10%; padding-left: 10%;" name="name" placeholder="{{__($groups[0]['description'])}}" required autofocus autocomplete="name" />
    </div>
    <div class="mt-4">
        <button class="button button1" href="#" data-toggle="modal" data-target="#modalAdd">
            {{ __('Editar') }}
        </button>
        <button class="button button1" href="#" data-toggle="modal" data-target="#modalAdd">
            {{ __('Añadir') }}
        </button>
    </div>
    <div class="flex flex-col">
        <div class="m-auto mt-7 overflow-x-auto ">
            <div class="py-2 simple-table align-middle inline-block max-w-3xl sm:px-6 lg:px-8">
                <x-jet-label class="m-auto">{{__('Miembros')}}</x-jet-label>
                <x-table>
                    <x-slot name="head">
                        @foreach($headersStudents as $head)
                            <x-table.heading>{{ __($head) }}</x-table.heading>
                        @endforeach
                    </x-slot>
                    <x-slot name="body">
                        @foreach($students as $s)
                            <x-table.row>
                                <x-table.cell href="/grupo/1">{{__($s['name'])}}</x-table.cell>
                                <x-table.cell>{{__($s['age'])}}</x-table.cell>
                                <x-table.cell>{{__($s['level'])}}</x-table.cell>
                                <x-table.cell>{{__($s['last-access'])}}</x-table.cell>
                                @if($s['active'] === 0)
                                    <x-table.cell>No</x-table.cell>
                                @else
                                    <x-table.cell>Sí</x-table.cell>
                                @endif
                            </x-table.row>
                        @endforeach
                    </x-slot>
                </x-table>


            </div>
        </div>
    </div>
@endsection
@extends('layouts/contactModalLayout')
</body>
