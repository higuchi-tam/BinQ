<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //ポリシーの機能を使用するので、ここでは一律にtrueを返すようにしている。
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
        return [
            'title' => 'required|max:50',
            'body' => 'required',
            'tags' => 'json|regex:/^(?!.*\s).+$/u',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'tags' => 'タグ',
        ];
    }
    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
