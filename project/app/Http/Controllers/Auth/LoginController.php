<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.index')->with('Success', 'Đăng nhập admin thành công');
        } elseif ($user->role == 'teacher') {
            return redirect()->route('teachers.index')->with('Success', 'Đăng nhập giáo viên thành công');
        } else {
            return redirect()->route('users.index')->with('Success', 'Đăng nhập học sinh thành công');
        }
        //
    }

    public function login(Request $request)
    {
        $user_id = User::email($request)->value('id');
        if ($user_id != null) {
            $password = User::find($user_id)->password;
//            if(strcmp($request->password,$password) == 0){
            if (Hash::check($request->password,$password)) {
                Auth::loginUsingId($user_id);
                $this->authenticated($request, Auth::user());
            }
            return redirect()->back()->with('Fail', 'Mật khẩu không đúng');
        }
        return redirect()->back()->with('Fail', 'Kiểm tra lại thông tin đăng nhập');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('Success', 'Đăng xuất thành công');
    }

}
