<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'max:20'],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.min' => 'Độ dài tối thiểu của tên là 2',
            'name.max' => 'Độ dài tối đa của tên là 20',
        ];
    }
}
