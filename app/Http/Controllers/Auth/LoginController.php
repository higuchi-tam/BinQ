<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Log;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * OAuth認証先にリダイレクト
     *
     * @param str $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * OAuth認証の結果受け取り
     *
     * @param str $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $providerUser = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('flash_message', '予期せぬエラーが発生しました');
        }
        if ($email = $providerUser->getEmail()) {
            $registerdFlg = User::where(['email' => $providerUser->getEmail()])->first();
            Log::debug('$providerUser');
            Log::debug($providerUser->getAvatar());
            Auth::login(User::firstOrCreate([
                'email' => $email
            ], [
                'name' => $providerUser->getName(),
                'profile_photo' => $providerUser->getAvatar()
            ]));
            if ($registerdFlg) {
                //ログインするたびに最新の情報を取得して更新
                $user = Auth::user();
                $user->name = $providerUser->getName();
                $user->profile_photo = $providerUser->getAvatar();
                $user->save();

                return redirect()->route('users.index')->with('flash_message', 'ログインしました。');
            } else {
                return redirect()->route('articles.index')->with('flash_message', '登録しました。プロフィールの編集をしましょう！');
            }
        } else {
            return redirect('/login')->with('flash_message', 'メールアドレスが取得できませんでした');
        }
    }
}
