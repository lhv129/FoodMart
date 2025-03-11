<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'name' => 'required|unique:suppliers,name,' . $this->id . 'id',
            'phone' => 'required|regex:/^(0)[0-9]{9}$/',
            'email' => 'required|email|unique:suppliers,email,'. $this->id . 'id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đơn vị không được để trống',
            'name.unique' => 'Tên đơn vị này đã có, vui lòng nhập tên khác',
            'email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email của bạn đã được tạo, vui lòng chọn email khác.',
            'phone.regex' => 'Số điện thoại phải bắt đầu từ 0 và đủ 10 số.',
        ];
    }
}
