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
}
