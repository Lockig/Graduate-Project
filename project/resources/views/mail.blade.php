{{--@component('mail::message')--}}
{{--    Your reset password is {{$details}}--}}
{{--    <br>--}}


{{--Thanks--}}
{{--{{config('app.name')}}--}}
{{--@endcomponent--}}
{{--<table style="width: 100%; height: 100%; min-width: 348px;" border="0" cellspacing="0" cellpadding="0">--}}
{{--    <tbody>--}}
{{--    <tr style="height: 32px;">--}}
{{--        <td></td>--}}
{{--    </tr>--}}
{{--    <tr align="center">--}}
{{--        <td>--}}
{{--            <table style="padding-bottom:20px;max-width:516px;min-width:220px">--}}
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <td style="width: 8px;"></td>--}}
{{--                    <td>--}}
{{--                        <div style="--}}
{{--                            border-style: solid;--}}
{{--                            border-width: thin;--}}
{{--                            border-color: #dadce0;--}}
{{--                            border-radius: 8px;--}}
{{--                            padding: 40px 20px;--}}
{{--                            ">--}}
{{--                            <img src="https://ci5.googleusercontent.com/proxy/T_zJ7UbaC9x27OP4-ZCPfDipqYLSGum30AlaxEycVclfvxO8Cze0sZ0kCrXlx6a-MgvW2tswbIyiNVfczjDuGh9okorzC5SUJDfwkHr6-3j1KUu94HuAw5uxM_jaElQef3Sub84=s0-d-e1-ft#https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_74x24dp.png" alt="google"--}}
{{--                                style="margin-bottom: 16px;"--}}
{{--                            >--}}
{{--                            <div--}}
{{--                                style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">--}}
{{--                                <div style="font-size:24px">--}}
{{--                                    Reset password email--}}
{{--                                </div>--}}
{{--                                <table style="margin-top:8px;">--}}
{{--                                    <tbody>--}}
{{--                                    <tr style="line-height: normal">--}}
{{--                                        <td style="padding-right: 8px;">--}}
{{--                                            <span--}}
{{--                                                style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">{{$email}}</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr style="line-height: normal">--}}
{{--                                        <td style="padding-right: 8px;">--}}
{{--                                            <span--}}
{{--                                                style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">{{$details}}</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    </tbody>--}}
{{--</table>--}}

<div style="width: 600px;margin: 0 auto">
    <div class="text-center">
        <h2>Vistarsoft</h2>'
            <p>{{$email}}</p>
        <p>Mật khẩu được đặt lại là {{$details}}</p>
    </div>
    <a href="" style="display: inline-block; background: green; color: #fff; padding: 7px 25px; font-weight: bold;">Quay lại trang đăng nhập</a>
</div>
