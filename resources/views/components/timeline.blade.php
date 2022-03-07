@props(['hirerResources', 'hirer', 'resource'])

<div class="mt-4">
    @if (auth()->user()->user_type === 'hirer' and $hirerResources != null)
        @foreach ($hirerResources as $hirerResource)
            <p class="text-gray-700 mt-4">You have hired
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

            <span class="text-sm text-gray-400">  {{$hirerResource->created_at->diffForHumans()}} </span>
            </p>
        @endforeach
    @endif
    @if(auth()->user()->user_type === "resource" and $hirerResources != null)
        @foreach ($hirerResources as $hirerResource)
            <p class="text-gray-700 mt-4">You are hired by
                {{ $hirerResource->hirer->user->name }}
                to Pair Programming for
                @if($hirerResource->monthly)
                    1 month.
                @elseif($hirerResource->weekly)
                    1 week.
                @elseif($hirerResource->hours)
                    {{ $hirerResource->hours  }} hours.
                @endif

                <span class="text-sm text-gray-400">  {{$hirerResource->created_at->diffForHumans()}} </span>
            </p>
        @endforeach
    @endif
</div>
