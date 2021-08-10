@component('mail::message')
# Confirmation of Availability


@component('mail::button', ['url' => $url])
Yeah!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
