@component('mail::message')
Hello {{$name}},  <br>
A password reset request has been sent for this account. 

To confirm the request and change password, follow the link below
@component('mail::button', ['url' => $link])
Reset Password
@endcomponent

Sincerely,  
BrainFarm
@endcomponent