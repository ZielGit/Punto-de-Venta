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
            'document_type' => 'required|in:DNI,RUC',
            'document_number' => 'required|unique:customers,document_number',
            'address' => 'nullable|string|max:255', 
            'phone' => 'nullable|string|unique:customers|max:9', 
            'email' => 'nullable|string|unique:customers|max:255|email:rfc,dns'
        ];
    }
}
