<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'color'=> 'bail|required|string|max:50',
            'size'=> 'bail|required|string|max:10',
            'img_color'=> 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'price'=> 'bail|required|numeric|min:1|max:10000000',
            'quantity'=> 'bail|required|numeric|min:1|max:10000',

        ];
    }
}
