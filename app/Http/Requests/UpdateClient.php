<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClient extends FormRequest
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
            'dni' => 'required|string|unique:clients,dni,'. $this->route('client')->id.'|min:8|max:8', 
            'ruc' => 'nullable|string|unique:clients,ruc,'. $this->route('client')->id.'|min:11|max:11', 
            'address' => 'nullable|string|max:255', 
            'phone' => 'string|nullable|unique:clients,phone,'. $this->route('client')->id.'|max:9', 
            'email' => 'string|nullable|unique:clients,email,'. $this->route('client')->id.'|max:255|email:filter'
        ];
    }

     public function messages()
    {
        return[
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 255 caracteres.',

            'dni.required' => 'Este campo es requerido.',
            'dni.string' => 'El valor no es correcto.',
            'dni.unique' => 'Este DNI ya se encuentra registrado.',
            'dni.min' => 'Se requiere de 8 caracteres.',
            'dni.max' => 'Solo se permite 8 caracteres.',

            'ruc.string' => 'El valor no es correcto.',
            'ruc.unique' => 'El número de RUC ya se encuentra registrado.',
            'ruc.min' => 'Se requiere de 11 caracteres.',
            'ruc.max' => 'Solo se permite 11 caracteres.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo se permite 255 caracteres.',

            'phone.string' => 'El valor no es correcto.',
            'phone.unique' => 'El número de celular ya se encuentra registrado.',
            'phone.min' => 'Se requiere de 9 caracteres.',
            'phone.max' => 'Solo se permite 9 caracteres.',

            'email.string' => 'El valor no es correcto.',
            'email.unique' => 'La dirección de correo electrónico ya se encuentra registrado.',
            'email.max' => 'Solo se permite 255 caracteres.',
            'email.email' => 'No es un correo electrónico.',
        ];
    }
}
