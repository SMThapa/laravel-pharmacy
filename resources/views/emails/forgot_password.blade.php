@component('mail::message')

HI, {{$user->name}}, Forgot Your password?

<p>
    It happens. Click the link below to restart your password.
</p>

<p>
    @component('mail::button', ['url'=>url('reset/'.$user->remember_token)])
        Reset Your Password
    @endcomponent
</p>

! in case you have any issue recovering your password, please contact us using the info from contact us pages-faq
Thanks, <br>

{{config('app.name')}}
    
@endcomponent