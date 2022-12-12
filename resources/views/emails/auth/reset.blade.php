@component('mail::message')
# Introduction

Blood Bank ResetPassword.

@component('mail::button', ['url' => 'http://ipda3.com'])
Reset
@endcomponent

<p>Your Reset Code is : {{ $pin_num }}</p><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
