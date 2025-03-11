<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Danh mục sản phẩm không được để trống',
            'name.unique' => 'Danh mục sản phẩm này đã có, vui lòng nhập tên khác',
            'slug.required' => 'Slug của danh mục sản phẩm không được để trống',
            'slug.unique' => 'Slug của danh mục sản phẩm này đã có, vui lòng nhập tên khác'
        ];
    }
}
