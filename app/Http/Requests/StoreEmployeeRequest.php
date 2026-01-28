<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255|unique:employees,name',
            'email'       => 'required|email|unique:employees,email',
            'phone'       => 'nullable|string|max:20|unique:employees,phone',
            'designation' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return  [
            'name.unique' => 'An employee with this name already exist',
            'email.unique' => 'This email is already registered',
            'phone:unique' => 'This phone number is already in use',
            
        ];
    }
}
