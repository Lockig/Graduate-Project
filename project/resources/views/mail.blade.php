@component('mail::message')
    Your reset password is {{$details['password']}}
    <br>



Thanks
{{config('app.name')}}
@endcomponent
