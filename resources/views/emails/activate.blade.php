@component('mail::message')
Hello {{$name}},  <br>
An account has been created for you on BrainFarm

To activate your account, follow the link below
@component('mail::button', ['url' => $link])
Activate Account
@endcomponent

Sincerely,  
BrainFarm
@endcomponent