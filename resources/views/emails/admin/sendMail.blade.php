@component('mail::message')
# Announcement

Hi {{ $user->username }},

{!! $message !!}

@component('mail::button', ['url' => route('landing')])
Login Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
