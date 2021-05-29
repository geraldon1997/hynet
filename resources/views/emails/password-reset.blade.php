@component('mail::message')
# Notification

<h1>Forget Password Email</h1>

You can reset password from bellow link:
@component('mail::button', ['url' => route('user.reset-password', $token)])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
