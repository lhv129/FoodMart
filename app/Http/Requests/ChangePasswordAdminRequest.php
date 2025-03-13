<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordAdminRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required|min:6|max:100',
            "password_confirm" => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống thông tin :attribute.',
            'password.min' => 'Mật khẩu tối thiểu ít nhất 6 kí tự.',
            'password.max' => 'Mật khẩu quá dài, vui lòng nhập lại.',
            'same' => 'Mật khẩu phải giống nhau,vui lòng kiểm tra lại.'
        ];
    }
}
