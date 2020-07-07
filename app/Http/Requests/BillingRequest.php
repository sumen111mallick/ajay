<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BillingRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'address'               =>'required',
            'cost_centre_no'        =>'required',
            'gstin'                 =>'required',
            'state'                 =>'required',
            'state_code'            =>'required',
            'status'                =>'required|boolean',
            'vendor_code'           =>'required|exists:vendors,vendor_code'
        ];
    }
}
