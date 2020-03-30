<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccPost extends FormRequest
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
            'acc_man' =>'required|regex:/^[\x{4e00}-\x{9fa5}]{2,6}$/u',
            'acc_addre'=>'required',
            'acc_times'=>'required',
            'acc_list'=>'required',
        ];
    }
    public function messages(){
        return [
            'acc_man.required'=>'访问人名称必填',
            'acc_man.regex'=>'访问人名称必须中文且2-6位',
            'acc_addre.required'=>'访问人地址不能为空',
            'acc_times.required'=>'下次访问人世间不能为空',
            'acc_list.required'=>'访问详情不能为空',
        ];
    }
}
