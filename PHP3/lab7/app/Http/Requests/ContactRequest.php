<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:50'],
            'phone' => ['required', 'regex:/^(0|\+84)[0-9]{9,10}$/'],
            'description' => ['required', 'min:10', 'max:500'],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.min' => 'Độ dài của tên tối thiểu là 2 ký tự',
            'name.max' => 'Độ dài của tên tối đa là 20 ký tự',

            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.min' => 'Tiêu đề tối thiểu 3 ký tự',
            'title.max' => 'Tiêu đề tối đa 50 ký tự',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',

            'description.required' => 'Vui lòng nhập lời nhắn',
            'description.min' => 'Lời nhắn tối thiểu 10 ký tự',
            'description.max' => 'Lời nhắn tối đa 500 ký tự',
        ];
    }

}
