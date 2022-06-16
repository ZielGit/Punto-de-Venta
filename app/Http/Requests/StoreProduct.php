<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'code' => 'nullable|string|unique:products,code',
            'name' => 'required|string|unique:products,name|max:255', 
            'image' => 'nullable|string',
            'sell_price' => 'required',
            'status' => 'required|in:ACTIVE,DEACTIVATED',
            'category_id' => 'required|exists:categories,id', 
            'provider_id' => 'required|exists:providers,id'
        ];
    }

    public function messages()
    {
        return[
            'sell_price.required'=>'El campo precio de venta es requerido.',
            'code.string'=>'El valor no es correcto.',
            'code.max'=>'Solo se permite 8 dígitos.',
            'code.min'=>'Se requiere de 8 dígitos.',
        ];
    }
}
