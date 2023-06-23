<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'group_id' => "required",
            'title' => "required | max:50",
            'category' => "required",
            'date' => "required",
            'entry_fee' => "required | numeric",
            'content' => "required | max:500",
            'image_url' => "required",
        ];
    }

    public function attributes()
    {
        return [
            "group_id" => "管理者ID",
            "title" => "タイトル",
            "category" => "カテゴリー",
            "date" => "開催日時",
            "entry_fee" => "参加費",
            "content" => "内容",
            "image_url" => "画像",
        ];
    }
}
