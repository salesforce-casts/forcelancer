@component('mail::message')
    # Are you available to Pair Program?

    @component('mail::button', ['url' => $signedUrl])
        Yeah!
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
