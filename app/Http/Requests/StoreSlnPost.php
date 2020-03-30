<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSlnPost extends FormRequest
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
        if($name=='slnstore'){
            return [
                "sln_name"=>"required|unique:sln|regex:/^[\x{4e00}-\x{9fa5}0-9a-zA-Z]{2,5}$/u",
                "sln_tel"=>"required|regex:/^1[356789]\d{9}$/"
            ];
        }else{
            return [
                'sln_name' => [
                    'regex:/^[\x{4e00}-\x{9fa5}0-9a-zA-Z]{2,5}$/u',
                    Rule::unique('sln')->ignore(request()->id,"sln_id"),
                ],
                "sln_tel"=>"required|regex:/^1[356789]\d{9}$/"
            ];
        }
    }
    public function messages(){
        return [
            "sln_name.required"=>"业务员名称必填",
            "sln_name.unique"=>"业务员名称已存在",
            "sln_name.regex"=>"业务员名称由中文、字母、数字2-5位",
            "sln_tel.required"=>"业务员手机号不能为空",
            "sln_tel.regex"=>"业务员手机号格式不正确",
        ];
    }
}
