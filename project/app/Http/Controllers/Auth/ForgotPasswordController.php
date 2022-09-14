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

        $email = $request->input('email');
        $user_id = User::query()
            ->select('user_id')
            ->where('email', 'like', '%' . $email . '%')
            ->pluck('user_id')
            ->get('0');
        if ($user_id != null) {
            $random_password = Random::generate(5);
            $password = Account::query()
                ->where('user_id','==',$user_id)
                ->update
                ([
                    'password' => $random_password
                ]);
            dd($random_password);
            Mail::to($email)->send(new ResetPasswordMail($details));
            redirect()->back()->with('Success', 'Send reset mail successfully');
            sleep(2000);
            Auth::logout();
        }
        return view('users.login')->with('Warning', 'error');

    }

}
