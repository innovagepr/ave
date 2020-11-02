@foreach($user->rewards as $reward)
    {{$reward->name()}}
@endforeach

{{--{{$user}}--}}
