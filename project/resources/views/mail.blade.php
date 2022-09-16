@component('mail::message')
    Your reset password is {{$details['password']}}
    <br>
    Click the link below, login and change your password


@component('mail::button',['url'=>'http://localhost::8080/login'])
    Click me!
@endcomponent

Thanks
{{config('app.name')}}
@endcomponent
