<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
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
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ];
    }

    public function messages(){
        return[
            'name.required' => '姓名不能空白',
            'email.required' => '電子郵件不能空白',
            'email.email'  => '電子郵件格式錯誤',
            'password.required' => '密碼不能空白',
            'password.confirmed' =>'確認密碼不符',
            'password_confirmation.required' => '確認密碼不能空白',
            'role.required' => '權限必須設定'
        ];
    }


}
