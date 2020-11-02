{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
{{--<?php--}}
{{--    use App\Models\ListExercise;--}}
{{--    use App\Models\Word;--}}
{{--    use App\Models\User;--}}

{{--    public function split1() {--}}
{{--        return "Hello";--}}
{{--    }--}}
{{--    --}}
{{--@endphp--}}



<script src="https://kit.fontawesome.com/ace1e6a674.js" crossorigin="anonymous"></script>

<style>
    .container {
        width: 800px;
        /*margin-right: 10px;*/
        float: right;
        /*position: relative;*/
    }
    .progressbar {
        counter-reset: step;
    }
    .progressbar li {
        list-style-type: none;
        width: 6%;
        float: left;
        font-size: 16px;
        font-family: "Berlin Sans FB";
        position: relative;
        text-align: center;
        text-transform: uppercase;
        color: #7d7d7d;
    }
    .progressbar li:before {
        width: 30px;
        height: 30px;
        content: counter(step);
        counter-increment: step;
        line-height: 30px;
        border: 3px solid #073c63;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        border-radius: 50%;
        background-color: white;
    }
    .progressbar li:after {
        width: 100%;
        height: 5px;
        content: '';
        position: absolute;
        background-color: #7d7d7d;
        top: 15px;
        left: -50%;
        z-index: -1;
    }
    .progressbar li:first-child:after {
        content: none;
    }
    .progressbar li.active {
        color: green;
    }
    .progressbar li.active:before {
        border-color: #55b776;
    }
    .progressbar li.active + li:after {
        background-color: #55b776;
    }

    .iconAudio{
        font-size: 50px;
    }
</style>

@extends('layouts/app')
<div class="container">
    <ul class="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

</div>

<div class="iconAudio">
    <a href="/homepage"><i class="fas fa-volume-up"></i></a>
</div>

<div>

    <p>Word: {{ $var = "hueso" }}</p>

    <p> Unordered: {{  $arr1 = str_shuffle($var) }}</p>

    <p>Split: {{ print_r($arr2 = str_split($arr1), true) }}</p>

    <table>
        <tr>
            @for ($i = 1; $i <= strlen($var); $i++)
                <th> letter {{$i}} </th>
            @endfor

        </tr>
        <tr>
            <td>culin</td>
            <td>culin 2</td>
            <td>{{$arr2[0]}}</td>
        </tr>

    </table>
</div>


