@component('mail::message')
# Notification

Dear {{ auth()->user()->fullname }},

@component('mail::panel')
{{ $message }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
