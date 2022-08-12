@props(['events'])

{{--  start of updated ui  --}}
@foreach( $events as $event)
    <div class=" w-full flex flex-row items-center p-4">
        <img src="img/Group 91.png" class="w-10 flex-none">
        <div class="w-full card-body">
            <div class="flex">
                <h4 class="m-auto w-full font-bold">
                    {{$event->narration}} 
                    <br> 
                    <small>
                        {{$event->created_at->diffForHumans()}}
                    </small>
                </h4>
                <div class="flex-end">
                    <button id="sliderBtn"
                        class="w-full flex-none text-right text-gray-900 md:block">
                        <img src="{{ asset('img/Play.png') }}">
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{--  End of updated ui  --}}


{{--  <div class="mt-4">
    <p class="text-2xl">Timeline</p>
    @foreach( $events as $event)
        <p class="mt-2">
            {{$event->narration}} <span class="text-sm text-gray-400">{{$event->created_at->diffForHumans()}}</span>
        </p>
    @endforeach
</div>  --}}
