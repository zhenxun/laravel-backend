<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentsStoreRequest extends FormRequest
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
            'file' => 'required|mimes:jpeg,png,gif,pdf,doc,docx,xls,xlsx,ptt,pttx,txt'
        ];
    }

    public function messages(){
        return[
            'file.required' => '文件不能空白',
            'file.mimes' => '僅接受以下格式檔案:jpeg,png,gif,pdf,doc,docx,xls,xlsx,ptt,pttx,txt'
        ];
    }
}
