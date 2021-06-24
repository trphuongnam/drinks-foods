<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UserManageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->type == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => 'required|unique:users,phone|numeric',
            'email' => 'required|unique:users,email|email',
            'address' => 'required',
            'username' => 'required|unique:users,username|min:8|max:15',
            'password' => 'required|max:20|min:8',
            're_password' => 'required|same:password',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'err_fullname',
            'gender.required' => 'err_gender',
            'birthday.required' => 'err_birthday',
            'phone.required' => 'err_phone1',
            'phone.unique' =>'phone_exist',
            'phone.numeric' =>'err_phone2',
            'phone.max' =>'err_phone2',
            'phone.min' =>'err_phone2',
            'email.required' => 'err_email1',
            'email.unique' =>'email_exist',
            'email.email' => 'err_email2',
            'address.required' =>'err_address',
            'username.required' => 'err_username1',
            'username.unique' => 'username_exist',
            'username.max' => 'err_username3',
            'username.min' => 'err_username2',
            'password.required' => 'err_password1',
            'password.min' => 'err_password2',
            'password.max' => 'err_password3',
            're_password.required' => 'err_re_password',
            're_password.same' => 'err_re_password1',
            'type.required' => 'err_select_type',
        ];
    }
}
