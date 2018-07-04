<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '姓名不能空白',
            'email.required' => '電子郵件不能空白',
            'email.email' => '電子郵件格式錯誤',
            'role.required' => '必須至少擁有一個權限',
        ];
    }
}
