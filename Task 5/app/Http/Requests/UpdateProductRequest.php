<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_en'=>['required','string','between:2,512'],
            'name_ar'=>['required','string','between:2,512'],
            'price'=>['required','numeric','between:1,99999.99'],
            'quantity'=>['required','integer','between:1,999'],
            'code'=>['required','integer','digits:6','unique:products,code,'.$this->id],
            'status'=>['nullable','in:1,0'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['required','integer','exists:subcategories,id'],
            'details_en'=>['required','string'],
            'details_ar'=>['required','string'],
            'image'=>['nullable','mimes:png,jpg,jpeg','max:1024']
        ];
    }
}
