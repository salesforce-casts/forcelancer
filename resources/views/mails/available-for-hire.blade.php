@component('mail::message')
# Are you available to Pair Program?

@component('mail::button', ['url' => $signedUrl])
Yeah!
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
