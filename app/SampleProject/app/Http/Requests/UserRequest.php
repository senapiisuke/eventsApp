<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            //バリデーションルール
            "name" => "required | string | max:50",
            "kana" => "required | string | regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u | max:50",
            "tell" => "nullable | numeric | regex:/^[0-9-]+$/",
            "email" => "required | email",
            "password" => "required | min:8",
        ];
    }

    public function attributes()
    {
        return [
            "name" => "名前",
            "kana" => "フリガナ",
            "tell" => "電話番号",
            "email" => "メールアドレス",
            "password" => "パスワード",
        ];
    }
}