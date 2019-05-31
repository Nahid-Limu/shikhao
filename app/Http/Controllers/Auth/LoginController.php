<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/dashboard';

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username=$this->findUserName();
//        return $this->username;
    }

    public function findUserName(){
        $login= request()->input('email');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$fieldType => $login]);
        return $fieldType;

    }

    //after logout redirection method
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    protected function credentials(Request $request)
    {
        $credentials= $request->only($this->username(), 'password');
        $credentials['status']=1;
        return $credentials;

//        return ['email'=>$request->{$this->username()},'password'=>$request->password,'status'=>'1'];
    }

    public function username()
    {
        return $this->username;
    }


}
