<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $email = User::query()->email($request)->value('email');;
        $user_id = User::query()->email($request)->value('user_id');
        if ($user_id != null) {
            $random_password = Random::generate(5);
            $details = [
                'password'=>$random_password
            ];
            Mail::to($email)->send(new ResetPasswordMail($details));
            Account::find($user_id)->update($details);
            return redirect()->back()->with('Success', 'Đã gửi mail reset pass thành công');
        }
        return redirect('/login')->with('Warning', 'Email không đúng');

    }

}
