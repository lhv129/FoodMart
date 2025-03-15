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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Danh mục sản phẩm không được để trống',
            'name.unique' => 'Danh mục sản phẩm này đã có, vui lòng nhập tên khác',
            'image.required' => 'Vui lòng chọn ảnh danh mục.',
            'image.image' => 'File tải lên phải là ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
        ];
    }
}
