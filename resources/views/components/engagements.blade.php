@props(['hirerResources', 'active'])

<div class="mt-4">
    <div>
        @if ($active === true)
            <p class="text-2xl mt-4">Ongoing Engagements</p>
        @else
            <p class="text-2xl mt-8"> Completed Engagements</p>
        @endif
    </div>

    @if (auth()->user()->user_type === 'hirer' and $hirerResources != null)
        @foreach ($hirerResources as $hirerResource)
            <p class="text-gray-700 mt-4">
                @if ($active === true)
                    <a href="{{ route('show_review', $hirerResource->id) }}" class="underline">
                        Complete
                    </a>
                @else
                    <strong class="rounded-full bg-red-100 px-2">Completed</strong>
                @endif
                You have hired
                <a href="{{ route('show_profile', $hirerResource->resource->id) }}"
                   class="underline underline-offset-4">
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

            <p class="text-gray-700 mt-4">

                @if ($active === true)
                    You are hired by
                @else
                    You were hired by
                @endif
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
