<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Utilities\Constant;

class CreateShippingRequest extends Request
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
            'shipper_first_name'   => 'bail|required|max:255',
            'shipper_last_name'    => 'bail|required|max:255',
            'shipper_contact'      => 'bail|required|max:255',
            'shipper_address'      => 'bail|required|max:255',
            'consignee_first_name' => 'bail|required|max:255',
            'consignee_last_name'  => 'bail|required|max:255',
            'consignee_contact'    => 'bail|required|max:255',
            'consignee_address'    => 'bail|required|max:255',
            'mode'                 => 'bail|required|in:'.Constant::HOUSE_TO_HOUSE.','.Constant::BRANCH_PICK_UP,
            'origin'               => 'bail|required|integer',
            'destination_branch'   => 'bail|integer|required_if:mode,'.Constant::BRANCH_PICK_UP,
            'location'             => 'bail|required|max:255',
        ];
    }
}
