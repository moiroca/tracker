<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateShippingLocation extends Request
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
     * @todo Validation For Duplication Shipping Location
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shipping_location' => 'bail|required|max:255'
        ];
    }
}
