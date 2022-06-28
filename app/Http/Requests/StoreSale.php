<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSale extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'tax' => 'required|numeric',
            'total' => 'required|numeric',
            'product_id.*' => 'integer',
            'product_id' => 'required|array',
            'quantity.*' => 'numeric',
            'quantity' => 'required|array',
            'price.*' => 'numeric',
            'price' => 'required|array',
            'discount.*' => 'numeric',
            'discount' => 'required|array'
        ];
    }
}
