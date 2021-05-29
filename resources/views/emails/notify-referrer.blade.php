@component('mail::message')
# Notification

Dear {{ $myname }},

@component('mail::panel')
{{ $message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
