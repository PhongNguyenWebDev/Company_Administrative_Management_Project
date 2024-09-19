@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <!-- Header Content Here -->
        @endcomponent
    @endslot

    {{-- Body --}}
    @slot('subcopy')
        @component('mail::subcopy')
            # Email Verification

            Hello {{ $user->name }},

            Please click the button below to verify your email address:

            @component('mail::button', ['url' => url('/email/verify/' . $user->id)])
                Verify Email
            @endcomponent

            Thanks,
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- Footer Content Here -->
        @endcomponent
    @endslot
@endcomponent
