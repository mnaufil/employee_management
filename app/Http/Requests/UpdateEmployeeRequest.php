<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $employeeId = $this->route('employee')->id;

        return [
            'name'        => 'required|string|max:255|unique:employees,name,' . $employeeId,
            'email'       => 'required|email|max:255|unique:employees,email,' . $employeeId,
            'phone'       => 'nullable|string|max:20|unique:employees,phone,' . $employeeId,
            'designation' => 'nullable|string|max:255',
        ];
    }
}
