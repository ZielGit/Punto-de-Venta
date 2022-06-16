<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
            'dni' => 'required|string|unique:customers|min:8|max:8', 
            'ruc' => 'nullable|string|unique:customers|min:11|max:11', 
            'address' => 'nullable|string|max:255', 
            'phone' => 'nullable|string|unique:customers|max:9', 
            'email' => 'nullable|string|unique:customers|max:255|email:rfc,dns'
        ];
    }
}
