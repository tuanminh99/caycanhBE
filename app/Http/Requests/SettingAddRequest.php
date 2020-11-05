<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings|max:255',
            'config_value' => 'required',
        ];

    }
    public function messages()
    {
        return [
            'config_key.required' => 'Tên không được để trống',
            'config_key.unique' => 'Tên không được trùng',
            'config_key.max' => 'Tên tối đa không quá 255 ký tự',
            'config_value.required' =>'Tên không được để trống'
        ];
    }
}
