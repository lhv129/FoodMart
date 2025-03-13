<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileAdminRequest extends FormRequest
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
            'name' => 'required|max:100',
            'phone' => 'required|regex:/^(0)[0-9]{9}$/',
            'email' => 'required|email|unique:users,email,' . $this->id . 'id',
            'address' => 'required',
            'birthday' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute không được để trống',
            'email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email của bạn đã tồn tại, vui lòng chọn email khác.',
            'phone.regex' => 'Số điện thoại phải bắt đầu từ 0 và đủ 10 số.',
        ];
    }
}
