<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductManageRequest extends FormRequest
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
            'category' => 'required',
            'name' => 'required',
            'description' => 'max:200',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'type_required',
            'category.required' => 'category_required',
            'name.required' => 'name_required',
            'description.max' => 'description_max',
            'price.required' => 'price_required',
        ];
    }
}
