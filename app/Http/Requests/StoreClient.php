<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'dni' => 'required|string|unique:clients|min:8|max:8', 
            'ruc' => 'nullable|string|unique:clients|min:11|max:11', 
            'address' => 'nullable|string|max:255', 
            'phone' => 'string|nullable|unique:clients|max:9', 
            'email' => 'string|nullable|unique:clients|max:255|email:rfc,dns'
        ];
    }
}
