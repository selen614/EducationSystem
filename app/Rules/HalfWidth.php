<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class HalfWidth implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // 半角文字のみであるかをチェック
        return preg_match('/^[\x21-\x7E]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attributeは半角文字で入力してください。';
    }
}
