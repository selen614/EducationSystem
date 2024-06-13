<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Admin;
use App\Rules\HalfWidth;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', new HalfWidth],
            'password' => ['required', 'min:8', new HalfWidth],
        ];
    }

    public function attributes()
    {
    return [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ];
    }

    public function messages() {
        return [
            'email.required' => ':attributeは必須項目です。',
            'email.half_width' => ':attributeは半角文字で入力してください。',
            'password' => ':attributeは必須項目です。',
            'password.min' => ':attributeは:min字以上で入力してください。',
            'password.half_width' => ':attributeは半角文字で入力してください。',
        ];
    }
}
