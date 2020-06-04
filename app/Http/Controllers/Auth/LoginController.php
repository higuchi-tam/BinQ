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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        // ここから
        if (isset($_SERVER['HTTP_REFERER'])) {
            $intended = $_SERVER['HTTP_REFERER'];
        } else {
            $intended = '/';
        }
        session(['url.intended' => $intended]);
        // ここまで追加
        return view('auth.login');
    }

    protected function authenticated()
    {
        $intended = session('url.intended');
        if (parse_url($intended, PHP_URL_PATH) == '/') {
            $name = Auth::user()->name;
            return redirect()->route('users.show', $name)->with('flash_message', 'ログインしました');
        } else {
            return redirect($intended)->with('flash_message', 'ログインしました');
        }
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
            //SNSアカウントからEmailが取得できた場合

            //登録済みかどうか判断
            $registerdUser = User::where(['email' => $providerUser->getEmail()])->first();

            if ($registerdUser) {
                // 登録済みの場合

                Auth::login($registerdUser);
                //ログインするたびに最新の情報を取得して更新
                $user = Auth::user();
                $user->name = $providerUser->getId();
                $user->title = $providerUser->getName();
                $user->profile_photo = $providerUser->getAvatar();
                $user->save();

                return $this->authenticated();
            } else {
                // 登録済みでない場合
                $id = $providerUser->getId();
                $name = $providerUser->getName();
                $avatar = $providerUser->getAvatar();

                $new = new User();
                $new->email = $email;
                $new->name = $id;
                $new->title = $name;
                $new->profile_photo = $avatar;
                $new->save();

                return redirect()->route('users.edit', $providerUser->getId());
            }
        } else {
            return redirect('/login');
        }
    }
}
