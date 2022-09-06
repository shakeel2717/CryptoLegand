@component('mail::message')
# Confirm Your Withdrawal

You’ve initiated a request to withdraw {{ $amount }} {{ $method }} to the following address:
Address: {{ $address }}

Please carefully review the withdrawal address before you proceed. {{ config('app.name') }} will not be responsible for any funds sent to the wrong address.
if you have any issue, kindly contact our support team.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
