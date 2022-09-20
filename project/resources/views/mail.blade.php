@component('mail::message')
    Your reset password is {{$details['password']}}
    <br>
    Click the link below, login and change your password



Thanks
{{config('app.name')}}
@endcomponent
