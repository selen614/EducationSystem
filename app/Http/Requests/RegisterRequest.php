<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\HalfWidth;

class RegisterRequest extends FormRequest
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
            'name' => 'required | max:255',
            'kana' => 'required | max:255' ,
            'email' => ['required' , 'max:255',new HalfWidth],
            'password' => ['required','min:8','max:255',new HalfWidth, 'confirmed'],
            'password_confirmation' => ['required','min:8','max:255',new HalfWidth],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'ユーザーネーム',
            'kana' => 'カナ',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード確認',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeは必須項目です。',
            'name.max' => ':attributeは:max字以内で入力してください。',
            'kana.required' => ':attributeは必須項目です。',
            'kana.max' => ':attributeは:max字以内で入力してください。',
            'email.required' => ':attributeは必須項目です。',
            'email.max' => ':attributeは:max字以内で入力してください。',
            'email.half_width' => ':attributeは半角文字で入力してください。',
            'password.required' => ':attributeは必須項目です。',
            'password.min' => ':attributeは:min字以上で入力してください。',
            'password.max' => ':attributeは:max字以内で入力してください。',
            'password.half_width' => ':attributeは半角文字で入力してください。',
            'password.confirmed' => 'パスワードとパスワード確認が一致しません。',
            'password_confirmation.required' => ':attributeは必須項目です。',
            'password_confirmation.min' => ':attributeは:min字以上で入力してください。',
            'password_confirmation.max' => ':attributeは:max字以内で入力してください。',
            'password_confirmation.half_width' => ':attributeは半角文字で入力してください。',

        ];
    }
}
