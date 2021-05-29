@component('mail::message')
# Notification

Dear Admin,

@component('mail::panel')
{{ $message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
