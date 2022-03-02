@props(['hirerResources'])

<div class="mt-4">

{{$hirerResources}}
    @if ($hirerResources != null)
        -----
        @foreach ($hirerResources as $hirerResource)
            {{ $hirerResource->monthly }}
            {{ $hirerResource->weekly }}
            {{ $hirerResource->hourly }}
            {{ $hirerResource->hirer->user->name }}
{{--            <p>You have hired {{ $hirerResource->hirer->user->name }}--}}
{{--                to Pair Programming with you for--}}
{{--                @if($hirerResource->monthly != null)--}}
{{--                    1 month.--}}
{{--                @elseif($hirerResource->weekly != null))--}}
{{--                    1 week.--}}
{{--                @elseif($hirerResource->hourly != null))--}}
{{--                    {{ $hirerResource->hourly  }} hours.--}}
{{--                @endif--}}
{{--            </p>--}}
        @endforeach
    @endif
</div>
