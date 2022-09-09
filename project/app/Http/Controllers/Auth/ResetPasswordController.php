<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MyTestMail;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function sendMail(Request $request)
    {
        $email = $request->input('email');
        $check = User::query()->select('name')->where('email', 'like', '%' . $email . '%')->first();
        if ($check != null) {
            $details = [
                'password' => Random::generate('10')
            ];
            Mail::to($email)->send(new ResetPasswordMail($details));
            redirect()->back()->with('Success', 'Send reset mail successfully');
            sleep(2000);
            Auth::logout();
        }
        return view('users.login')->with('Warning', 'error');
    }
}
