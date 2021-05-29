@component('mail::message')
# Notification

Dear {{ $fullname }},
@component('mail::panel')
{{ $message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
