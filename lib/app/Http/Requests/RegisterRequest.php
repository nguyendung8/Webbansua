<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueEmail;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required' ,'email', new UniqueEmail],
            'password' => ['required' ,'min: 6'],
            'level' => ['required' ,'numeric']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'level.required' => 'Role là trường bắt buộc',
            'level.numeric' => 'Role phải là số',
        ];
    }
}
