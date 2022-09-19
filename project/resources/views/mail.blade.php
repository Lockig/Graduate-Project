@component('mail::message')
    Your reset password is {{$details}}
    <br>
    Click the link below, login and change your password



Thanks
{{config('app.name')}}
@endcomponent
