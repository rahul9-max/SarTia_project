@component('mail::message')

<p>Hello {{$user->name}}</p>

<p>We are Here to Help You</p>

@component('mail::button',['url'=>url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

<p>In Case you have any issue recovering your password,Please Contact Us</p>

Thanks<br>
{{config('app.home')}}
@endcomponent