<?php

namespace App\Http\Controllers\Auth;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        session(['gmailLoggedIn' => $user->getEmail()]);
        session(['NameLoggedIn' => $user->getName()]);
        if (User::where('email', '=',$user->getEmail())->count() == 0) {
            $newUser = new User;
            $newUser->email = $user->getEmail();
            $newUser->name = $user->getName();
            $newUser->password = "xcvbghjikldfgh";
            $newUser->login_type = 'Google';
            $newUser->save();
        }

        return Redirect::to(session('googleLoginBeforeLink')); // Will redirect 2 links back
    }

    public function logout(){
        session()->forget(['gmailLoggedIn', 'NameLoggedIn']);
        return Redirect::to(session('googleLoginBeforeLink'));
    }
}
