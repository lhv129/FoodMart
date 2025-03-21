<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodDeliveryRequest extends FormRequest
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
            'customer' => 'required|min:5|max:50',
        ];
    }

    public function messages()
    {
        return [
            'customer.required' => 'Vui lòng nhập tên khách hàng',
            'customer.min' => 'Vui lòng nhập họ và tên',
            'customer.max' => 'Tên quá dài, vui lòng nhập tên khác',
        ];
    }
}
