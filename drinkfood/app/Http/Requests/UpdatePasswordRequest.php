<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'required|min:8|max:20',
            'repassword' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'err_password1',
            'password.min' => 'err_password2',
            'password.max' => 'err_password3',
            'repassword.required' => 'err_re_password',
            'repassword.same' => 'err_re_password1'
        ];
    }
}
