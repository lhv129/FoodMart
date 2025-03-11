<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnitRequest extends FormRequest
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
            'name' => 'required|unique:units,name,' . $this->id . 'id',
            'slug' => 'required|unique:units,slug,' . $this->id . 'id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đơn vị không được để trống',
            'name.unique' => 'Tên đơn vị này đã có, vui lòng nhập tên khác',
            'slug.required' => 'Slug của tên đơn vị không được để trống',
            'slug.unique' => 'Slug này đã có, vui lòng chọn slug khác'
        ];
    }
}
