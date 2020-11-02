{{--@props{[--}}
{{--'sortable' => null--}}
{{--'direction' => null--}}
{{--]}--}}

{{--<th {{$attributes->merge(['class' => 'px-6 py-3 bg-cool-gray-50'])->only('class')}}>--}}
<th class="px-6 py-3 table-header">
    {{--    @unless($sortable)--}}
    <span class="px-6 py-3 text-center text-xs leading-4 font-medium uppercase tracking-wider">{{$slot}}</span>
    {{--    @else--}}
    {{--        <button {{$attributes->except('class')}} class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">--}}
    {{--            <button class="flex items-center space-x-1 text-left text-xs leading-4 font-medium">--}}

    {{--            <span> {{$slot}}</span>--}}

    {{--            <span>--}}
    {{--            @if($direction === 'asc')--}}
    {{--                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns=""></svg>--}}
    {{--                @elseif($direction === 'desc')--}}
    {{--                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns=""></svg>--}}
    {{--                @else--}}
    {{--                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns=""></svg>--}}
    {{--                @endif--}}
    {{--        </span>--}}
    {{--        </button>--}}
    {{--    @endif--}}
</th>
