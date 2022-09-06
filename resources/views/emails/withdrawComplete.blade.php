@component('mail::message')
# Withdrawal Successful

You've successfully withdrawn {{ $amount }} {{ $method }} to the address .
Your withdrawal address is {{ $address }}

If you don't recognize this activity, please contact us immediately.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
