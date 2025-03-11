<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentMethodRequest extends FormRequest
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
            'name' => 'required|unique:payment_methods,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phương thức thanh toán không được để trống',
            'name.unique' => 'Tên phương thức thanh toán này đã có, vui lòng nhập tên khác',
        ];
    }
}
