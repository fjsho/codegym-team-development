<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AttachmentFileValidation implements Rule
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
        // finder等においては小数点第二位の値で四捨五入されるので、10.05MBまでは"10.0MB"と表示される。
        // ユーザーの利便性を考慮して最大値はこの値に設定した。
        $max_file_size_mb = 10.05;
        
        return $file_size_mb < $max_file_size_mb && in_array($value->getMimeType(),['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/tiff']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Picture should be JPG, PNG, GIF, or TIFF images no larger than 10MB.');
    }
}
