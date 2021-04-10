<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProvider extends FormRequest
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
            'name' => 'required|string|max:255', 
            // agregar unique a email si lanza error
            'email' => 'required|email|string|max:200', 
            'ruc_number' => 'required|string|min:11|unique:providers,ruc_number,'. $this->route('provider')->id.'|max:11', 
            'address' => 'nullable|string|max:255', 
            'phone' => 'required|string|min:9|unique:providers,phone,'. $this->route('provider')->id.'|max:9',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 255 caracteres.',

            'email.required' => 'Este campo es requerido.',
            'email.email' => 'No es un correo electronico.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permite 255 caracteres.',
            'email.unique' => 'Ya se encuentra registrado.',

            'ruc_number.required' => 'Este campo es requerido.',
            'ruc_number.string' => 'El valor no es correcto.',
            'ruc_number.max' => 'Solo se permite 11 caracteres.',
            'ruc_number.min' => 'Se requiere 11 caracteres.',
            'ruc_number.unique' => 'ya se encuentra registrado.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo se permite 255 caracteres.',

            'phone.required' => 'Este campo es requerido.',
            'phone.string' => 'El valor no es correcto.',
            'phone.max' => 'Solo se permite 9 caracteres.',
            'phone.min' => 'Se requiere 9 caracteres.',
            'phone.unique' => 'ya se encuentra registrado.',
        ];
    }
}
