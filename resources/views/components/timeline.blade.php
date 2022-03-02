@props(['hirerResources'])

<div class="mt-4">

    @if ($hirerResources != null)
        @foreach ($hirerResources as $hirerResource)
            <p class="text-sm text-gray-700 mt-4">You have hired
                <a href="{{ route('show_profile', $hirerResource->resource->id) }}" class="underline">
                    {{ $hirerResource->resource->user->name }}
                </a>
                to Pair Programming with you for
                @if($hirerResource->monthly)
                    1 month.
                @elseif($hirerResource->weekly)
                    1 week.
                @elseif($hirerResource->hours)
                    {{ $hirerResource->hours  }} hours.
                @endif
            </p>
        @endforeach
    @endif
</div>
