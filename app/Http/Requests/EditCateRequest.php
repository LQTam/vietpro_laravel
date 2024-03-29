<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateRequest extends FormRequest
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
            // segment is the locate of url began from root path
            "cate_name" => "unique:vp_categories,cate_name,".$this->segment(4).',cate_id'
        ];
    }

    public function messages(){
        return [
            "cate_name.unique" => "Duplicate cate name on the table"
        ];
    }
}
