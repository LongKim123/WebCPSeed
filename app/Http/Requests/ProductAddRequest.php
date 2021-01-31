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
            'name'=>'required|unique:products|max:255|min:10',
            'price'=>'required',
            'category_id'=>'required',
            'contents'=>'required',
            

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'tên không đươc để trống',
            'name.unique'=>'tên không đươc phép trùng lặp',
            'name.max'=>'tên quá dài',
            'name.min'=>'tên phải trên 10 ký tự',
            'price.required'=>'Giá không được để trống',
            'category_id.required'=>'Danh muc không được để trống',
            'contents.required'=>'Nôi dung không đươc để trống',
            // 'tags[].array'=>'tag không đươc để trống',
            // 'tags[].size'=>'tag không đươc dưới 5',
            

        ];
    }
}
