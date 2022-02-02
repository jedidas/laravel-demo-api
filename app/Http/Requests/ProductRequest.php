<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
//        return [
//            'code' => 'required|unique:products',
//            'name' => 'required',
//            'slug' => 'required|unique:products',
//            'image' => 'required|mimes:jpeg,bmp,png,gif,svg',
//            'price' => 'required|number',
//            'discount' => 'required|number',
//            'active' => 'required|boolean',
//            'description' => 'required',
//            'brand_id' => 'required',
//        ];
        return [];
    }
}
