@props(['events'])

<div class="mt-4">
    <p class="text-2xl">Timeline</p>
    @foreach( $events as $event)
        <p class="mt-2">
            {{$event->narration}} <span class="text-sm text-gray-400">{{$event->created_at->diffForHumans()}}</span>
        </p>
    @endforeach
</div>
