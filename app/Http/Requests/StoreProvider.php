<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProvider extends FormRequest
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
            'name' => 'required|string|max:255|unique:providers,name',
            'ruc_number' => 'required|string|max:11|min:11|unique:providers,ruc_number',
            'email' => 'nullable|email|string|max:255|unique:providers,email',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:9|min:9|unique:providers,phone',
        ];
    }

    public function messages()
    {
        return[
            'ruc_number.required'=>'Este campo es requerido.',
            'ruc_number.string'=>'El valor no es correcto.',
            'ruc_number.max'=>'Solo se permiten 11 caracteres.',
            'ruc_number.min'=>'Se requiere de 11 caracteres.',
            'ruc_number.unique'=>'Ya se encuentra registrado.',
        ];
    }
}
