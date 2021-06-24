<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryManageRequest extends FormRequest
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
            'type' => 'required',
            'name' => 'required|unique:categories,name',
            'description' => 'max:200',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'type_required',
            'name.required' => 'name_required',
            'name.unique' => 'name_exists',
            'description.max' => 'desc_max',
            'status.required' => 'status_required'
        ];
    }
}
