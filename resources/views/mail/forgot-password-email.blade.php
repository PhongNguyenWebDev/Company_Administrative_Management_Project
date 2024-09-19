@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        @endcomponent
    @endslot
    # Reset Password Notification

    You are receiving this email because we received a password reset request for your account.

    @component('mail::button', ['url' => url('reset-password/' . $token)])
        Reset Password
    @endcomponent

    If you did not request a password reset, no further action is required.

    Thanks,<br>
    {{ config('app.name') }}

    @slot('footer')
        @component('mail::footer')
        @endcomponent
    @endslot
@endcomponent
