@component('mail::message')
    # Hello, {{ $user->name }}

    Your account has been created. Here are your login details:

    **Email:** {{ $user->email }}
    **Password:** {{ $password }}

    Please log in and change your password immediately.

    @component('mail::button', ['url' => route('password.request')])
        Login
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent
