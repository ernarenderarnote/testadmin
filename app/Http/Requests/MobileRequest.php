<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MobileRequest extends FormRequest
{
    /* public function authorize()
    {
        return \Gate::allows('product_edit');
    }
 */
    public function rules(Request $request)
    {
		if ($request->isMethod('post')) {
			return [
				'phone' => [
					'required',
				],
			];
		}
		return [ ];	
    }	
}
