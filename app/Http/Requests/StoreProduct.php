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
            'name' => 'required|string|unique:products|max:255', 
            // 'image' => 'required|dimensions:min_width=100,min_height=200', 
            'sell_price' => 'required', 
            // 'category_id' => 'integer|required|exists:App\Category,id', 
            // 'provider_id' => 'integer|required|exists:App\Provider,id'
            'code'=>'nullable|string|max:8|min:8',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.unique' => 'El producto ya está registrado.',
            'name.max' => 'Solo se permite 255 caracteres.',

            'sell_price.required'=>'El campo es requerido.',

            'code.string'=>'El valor no es correcto.',
            'code.max'=>'Solo se permite 8 dígitos.',
            'code.min'=>'Se requiere de 8 dígitos.',
            // 'image.required' => 'Este campo es requerido.',
            // 'image.dimensions' => 'Solo se permiten imágenes de 100x200 px.',

            // 'category_id.required' => 'Este campo es requerido.',
            // 'category_id.string' => 'El valor no es correcto.',
            // 'category_id.exists' => 'La categoria no existe.',

            // 'provider_id.required' => 'Este campo es requerido.',
            // 'provider_id.string' => 'El valor no es correcto.',
            // 'provider_id.exists' => 'El proveedor no existe.',
        ];
    }
}
