<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProfilePicValidation implements Rule
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
        $file_size_mb = $value->getSize() / 1024 / 1024;
        // finder等においては小数点第二位の値で四捨五入されるので、2.05MBまでは"2.0MB"と表示される。
        // ユーザーの利便性を考慮して最大値はこの値に設定した。
        $max_file_size_mb = 2.05;
        
        return $file_size_mb < $max_file_size_mb && in_array($value->getMimeType(),['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Picture should be JPG, PNG or GIF images no larger than 2MB.');
    }
}
