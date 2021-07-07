<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerRequest extends  FormRequest
{

    public function rules()
    {
        return [
            'client_name' => 'required|min:2',
            'client_address' => 'required|min:5',
            'total_product_value' => 'required|numeric|min:1',
            'total_shipping_value' => 'required'
        ];
    }

}
