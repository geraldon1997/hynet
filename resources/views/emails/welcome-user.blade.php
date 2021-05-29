@component('mail::message')
# Welcome Notification

Dear {{ $details['fullname'] }},

@component('mail::panel')
{{ $message }}
@endcomponent

@component('mail::table')
|          |                            |
| -------- | -------------------------- |
| Fullname | {{ $details['fullname'] }} |
| Email    | {{ $details['email'] }}    |
| Username | {{ $details['username'] }} |
| Password | {{ $details['password'] }} |
@endcomponent

@component('mail::button', ['url' => route('user.login'), 'color' => 'success'])
Login here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
