@component('mail::message')
# Are you available to Pair Program?

hey {{$resourceName}},

just wanted to check if you are available to pair-program with me?

@component('mail::button', ['url' => $signedUrl])
    Yeah!
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
