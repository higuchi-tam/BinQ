<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($this->id) {
            //編集の時、自分自身の重複は除外
            $unique = 'unique:users,userId,' . $this->id . ',id';
        } else {
            //新規登録のとき
            $unique = 'unique:users,userId';
        }

        return [
            'userId' => 'required | string | regex:/^[a-zA-Z0-9-_]+$/ | min:3 | max:16 |' . $unique,
            'email' => 'required',
        ];
        // if ($this->id) { // 編集画面の時
        //     $unique = 'unique:items,name,' . $this->id . ',id';
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザー名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード再入力'
        ];
    }
}
