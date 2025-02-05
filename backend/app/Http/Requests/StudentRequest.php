<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[a-zA-ZÀ-ÿ\s]+$/|max:32',
            'phone' => 'nullable|numeric|digits_between:9,16',
            'age' => 'nullable|numeric|min:0|max:100',
            'password' => 'required|string|max:64',
            'email' => 'required|email|unique:students,email|max:64',
            'sex' => 'nullable|string|in:m,f'
        ];
    }
    
}
