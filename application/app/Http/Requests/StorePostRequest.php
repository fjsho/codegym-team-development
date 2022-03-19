<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * @overRide
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        $all =  $this->all();
        if (isset($all['title'])) {
            $all['title'] = str_replace(array("\r", "\n"), '', $all['title']);
        }
        return $all;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:10000',
            'attachment_id' => 'nullable|integer',
        ];
    }
}
