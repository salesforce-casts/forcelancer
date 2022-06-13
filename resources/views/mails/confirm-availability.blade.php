@component('mail::message')
hey there!

sure i do have some bandwidth to look into this.

please go ahead and hire me.

@component('mail::button', ['url' => 'http://localhost:8000/profile/show/' . $resourceId])
    Yeah!
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
