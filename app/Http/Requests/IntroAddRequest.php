<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroAddRequest extends FormRequest
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
            'contents' => 'bail|required|unique:intros|max:2000',
        ];
    }
    public function messages()
    {
        return [
            'contents.required' => 'Nội dung không được để trống',
            'contents.unique' => 'Nội dung không được trùng',
            'contents.max' => 'Nội dung không quá 2000 ký tự',
        ];
    }
}
