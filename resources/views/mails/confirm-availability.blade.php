@component('mail::message')
@component('mail::button', ['url' => $url])
Yeah!
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
