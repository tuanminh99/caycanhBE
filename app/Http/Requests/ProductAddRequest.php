<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' => 'required',
            'stock' => 'required',
            'contents' => 'required',
            'category_id' => 'required',
            'tags'=> 'required'
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được trùng',
            'name.max' => 'Tên tối đa không quá 255 ký tự',
            'name.min' => 'Tên tối thiểu là 5 ký tự',
            'price.required' => 'giá không được để trống',
            'stock.required' => 'Số lượng không được để trống',
            'contents.required' => 'Nội dung không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'tags.required' => 'Tag không được để trống',
        ];
    }
}
