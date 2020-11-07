
{{--    <style>--}}
{{--        .container1 {--}}
{{--            width: 50%;--}}
{{--            margin: 20px auto;--}}
{{--        }--}}
{{--        .progressbar {--}}
{{--            counter-reset: step;--}}
{{--        }--}}
{{--        .progressbar li {--}}
{{--            list-style-type: none;--}}
{{--            float: left;--}}
{{--            width: 10%;--}}
{{--            position: relative;--}}
{{--            font-size: 25px;--}}
{{--            font-family: "Berlin Sans FB";--}}
{{--            text-align: center;--}}
{{--            color: #7d7d7d;--}}
{{--            z-index: 0;--}}

{{--        }--}}
{{--        .progressbar li:before {--}}
{{--            width: 45px;--}}
{{--            height: 45px;--}}
{{--            content: counter(step);--}}
{{--            counter-increment: step;--}}
{{--            line-height: 35px;--}}
{{--            border: 4px solid #2576ac;--}}
{{--            display: block;--}}
{{--            text-align: center;--}}
{{--            margin: 0 auto 10px auto;--}}
{{--            border-radius: 50%;--}}
{{--            background-color: #B4D5D4;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--        .progressbar li:after {--}}
{{--            width: 100%;--}}
{{--            height: 10px;--}}
{{--            content: '';--}}
{{--            position: absolute;--}}
{{--            background-color: #ACF9A4;--}}
{{--            border: 3px solid #2576ac;--}}
{{--            top: 19px;--}}
{{--            left: -50%;--}}
{{--            z-index:-1;--}}
{{--        }--}}
{{--        .progressbar li:first-child:after {--}}
{{--            content: none;--}}
{{--        }--}}
{{--        .progressbar li.active {--}}
{{--            color: black;--}}
{{--        }--}}
{{--        .progressbar li.active:before {--}}
{{--            border-color: #ACF9A4;--}}
{{--            background-color: white;--}}
{{--        }--}}
{{--        .progressbar li.active + li:after {--}}
{{--            background-color: #ACF9A4;--}}
{{--        }--}}

{{--    </style>--}}

<div class="container1">
    <ul class="progressbar">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li class = "active"></li>
        <li wire:click="goTo()"></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

