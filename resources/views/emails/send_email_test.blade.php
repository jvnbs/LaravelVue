@component('mail::message')
# Hello, {{ $details['name'] }}

This is a test email. 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
