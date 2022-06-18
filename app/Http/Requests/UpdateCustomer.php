<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest
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
            'document_number' => 'required|unique:customers,document_number,'.$this->route('customer')->id,
            'address' => 'nullable|string|max:255', 
            'phone' => 'nullable|string|unique:customers,phone,'. $this->route('customer')->id.'|max:9', 
            'email' => 'nullable|string|unique:customers,email,'. $this->route('customer')->id.'|max:255|email:filter'
        ];
    }
}
