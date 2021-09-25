<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postCommentRule extends FormRequest
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
            'comment' => ['required', 'max:140'],
            'post_id' => ['required', 'exists:posts,id'],
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'コメントの入力は必須です',
            'comment.max' => 'コメントの文字数は140文字以内です',
            'post_id.required' => '投稿が見つかりません',
            'post_id.exists' => '投稿が見つかりません',
        ];
    }
}
