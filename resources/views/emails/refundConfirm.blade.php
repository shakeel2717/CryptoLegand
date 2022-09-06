@component('mail::message')
# Refund Request Confirmation

Click Below button to Confirm your Refund Request for Plan {{ $plan }}.

@component('mail::button', ['url' => route('refund.request.confirm',['user' => $user,'tid' => $tid]) ])
Confirm Refund
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
