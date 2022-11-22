<?php

namespace App\Http\Controllers\Auth;

use App\Events\ResetPassword;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Random;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $email = User::query()->email($request)->value('email');;
        $user_id = User::query()->email($request)->value('id');
        if ($user_id != null) {
            $random_password = Random::generate(8);
            DB::table('users')
                ->where('id','=',$user_id)
                ->update([
                'password' => Hash::make($random_password)
//                'password' => Hash::make($random_password)
            ]);

            Mail::to($email)
                ->send(new ResetPasswordMail($random_password,$email));

            Session::put('email',$email);
            return redirect('/login')->with('Success', 'Đã gửi mail reset pass thành công');
        }
        return redirect()->back()->with('Warning', 'Email không đúng');

    }

}
