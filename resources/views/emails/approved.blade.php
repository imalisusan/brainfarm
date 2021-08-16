@component('mail::message')
Hello {{$name}},  <br>
Your account has been approved by our administrator. You can now log in and start your journey with BrainFarm

To login, follow the link below
@component('mail::button', ['url' => $link])
Log In
@endcomponent

Sincerely,  
BrainFarm
@endcomponent