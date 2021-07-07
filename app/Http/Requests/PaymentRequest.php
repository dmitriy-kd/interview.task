<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends  FormRequest
{

    public function rules()
    {
        return [
            'cardNumber' => 'required|min:14|numeric',
            'expire' => 'required|min:5',
            'cvc' => 'required|numeric|min:3',
            'cardHolder' => 'required'
        ];
    }
}
