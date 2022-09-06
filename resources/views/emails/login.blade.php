@component('mail::message')
# Login Successful

This Email is to inform you that you are logged into your {{ env('APP_NAME') }} account successfully.
You can use and explore all the features in your account. We provide an Authorised Login system. <br>

# Login Time: {{ now() }} <br>

If you don't recognize this activity, please contact us immediately.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
