<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->validateLogin($request);

        $user_id = User::query()
            ->select('user_id')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->pluck('user_id')->get('0');

        if ($user_id != null) {
            $password = User::find($user_id)->account->pluck('password')->get('0');
            if ($password == $request->input('password')) {
                $user = User::find($user_id);
                Auth::login($user);
                return redirect()->to(route('users.index'))->with('Success', 'Login successfully');
            }
            return redirect()->back()->with('Fail', 'Wrong password');
        }
        return redirect()->back()->with('Fail', 'Check back your credentials');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('Success','Log out successfully, please login to continue');
    }

}
