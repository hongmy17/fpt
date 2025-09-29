<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            
            'description.required' => 'Tên sản phẩm không được để trống.',
            'description.min' => 'Mô tả tối thiểu là 3 ký tự.',

            'price.required' => 'Giá sản phẩm không được để trống.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0.',

            'category_id.required' => 'Bạn phải chọn thể loại sản phẩm.',
            'category_id.exists' => 'Thể loại sản phẩm không hợp lệ.',
        ];
    }
}
