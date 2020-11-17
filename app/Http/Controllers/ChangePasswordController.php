<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * パスワード変更画面 表示
     */
    public function index()
    {
        $auth_user = Auth::user();

        return view('auth.changePassword.index', [
            'auth_user' => $auth_user
        ]);
    }
    /**
     * パスワード変更完了 表示
     */
    public function complete()
    {
        $auth_user = Auth::user();

        return view('auth.changePassword.complete', [
            'auth_user' => $auth_user
        ]);
    }

    /**
     * パスワード変更 処理
     */
    public function changePassword(Request $request)
    {
        //現在のパスワードが正しいかを調べる
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('flash_message', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('flash_message', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。新しいパスワードは6文字以上、new-password_confirmationフィールドの値と一致しているかどうか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->route('changePassword.complete')->with('flash_message', 'パスワードを変更しました。');
    }
}
