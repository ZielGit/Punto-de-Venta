<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'code' => 'nullable|string|unique:products,code,'.$this->route('product')->id,
            'name' => 'required|string|unique:products,name,'.$this->route('product')->id.'|max:255', 
            'image' => 'nullable|string', 
            'sell_price' => 'required',
            'status' => 'required|in:ACTIVE,DEACTIVATED',
            'category_id'=>'integer|required|exists:categories,id', 
            'provider_id'=>'integer|required|exists:providers,id',
        ];
    }

    public function messages()
    {
        return[
            'sell_price.required'=>'El campo es requerido.',
            'category_id.required' => 'Este campo es requerido.',
            'category_id.string' => 'El valor no es correcto.',
            'category_id.exists' => 'La categoria no existe.',
            'provider_id.required' => 'Este campo es requerido.',
            'provider_id.string' => 'El valor no es correcto.',
            'provider_id.exists' => 'El proveedor no existe.',
        ];
    }
}
