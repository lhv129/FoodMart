<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'customer' => 'required|max:100|min:5',
            'phone' => 'required|regex:/^(0)[0-9]{9}$/',
            'email' => 'required|email',
            'address' => 'required',
            'note' => 'max:500',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':Attribute không được để trống',
            'email' => 'Email không đúng định dạng.',
            'phone.regex' => 'Số điện thoại phải bắt đầu từ 0 và đủ 10 số.',
            'max' => ':Attribute quá dài vui lòng nhập lại',
            'min' => 'Vui lòng nhập họ và tên'
        ];
    }
}
