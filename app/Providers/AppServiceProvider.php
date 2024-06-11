<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //カタカナのみ許可
        Validator::extend('katakana', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^[ァ-ヶーｦ-ﾟ\s　]+$/u', $value);
        });
    
        Validator::replacer('katakana', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'カタカナで入力してください。');
        });

        //全角文字を禁止
        Validator::extend('no_fullwidth', function($attribute, $value, $parameters, $validator) {
            return !preg_match('/[^\x{0020}-\x{007E}\x{FF61}-\x{FF9F}]/u', $value);
        });
    
        Validator::replacer('no_fullwidth', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, '半角文字で入力してください。');
        });
    }
}
