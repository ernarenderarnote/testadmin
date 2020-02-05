<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class OtpRequest extends FormRequest
{
    /* public function authorize()
    {
        return \Gate::allows('product_edit');
    }
 */
    public function rules()
    {
        return [
            'otp' => [
                'required',
            ],
        ];
    }
}
