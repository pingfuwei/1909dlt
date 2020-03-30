<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCtrPost extends FormRequest
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
        $name = \Route::currentRouteName();
        // dd($name);
        if($name=='ctrstore'){
            return [
                "ctr_name"=>"required|unique:ctr|regex:/^[\x{4e00}-\x{9fa5}0-9a-zA-Z]{2,5}$/u",
            ];
        }else{
            return [
                'ctr_name' => [
                    'regex:/^[\x{4e00}-\x{9fa5}0-9a-zA-Z]{2,5}$/u',
                    Rule::unique('ctr')->ignore(request()->id,"ctr_id"),
                ],
            ];
        }
    }
    public function messages(){
        return [
            "ctr_name.required"=>"客户名称必填",
            "ctr_name.unique"=>"客户名称已存在",
            "ctr_name.regex"=>"客户名称由中文、字母、数字2-5位",
        ];
    }
}
