<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $uidUser = $this->route('user');
        $idUser = User::where('uid', $uidUser)->value('id');

        return [
            'fullname' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => [
                'required',
                'numeric',
                Rule::unique('users')->ignore($idUser)
                //'unique:users,phone,'.$idUser.',id',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($idUser)
                //'unique:users,email,'.$idUser.',id',
            ],
            'address' => 'required',
            'username' => [
                'required',
                'min:8',
                Rule::unique('users')->ignore($idUser)
                //'unique:users,username,'.$idUser.',id'
            ],
            'type' => 'required'
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
            'username.min' => 'err_username2',
            'type.required' => 'err_select_type'
        ];
    }
}
