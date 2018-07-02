<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'rank' => 'required'
        ];
    }

    public function messages(){
        return[
            'title.required' => '標題不能空白',
            'content.required' => '內容不能空白',
            'rank.required' => '排序不能空白',
        ];
    }


}
