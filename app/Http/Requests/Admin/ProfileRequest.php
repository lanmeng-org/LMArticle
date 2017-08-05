<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;

class ProfileRequest extends Request
{
    public function rules()
    {
        return [
            'name'        => 'required|min:1',
            'email'       => 'required|email',
            'oldPassword' => 'required',
            'password'    => 'min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'name'                  => '用户名',
            'email'                 => '邮箱',
            'oldPassword'           => '原密码',
            'password'              => '新密码',
            'password_confirmation' => '确认新密码',
        ];
    }

    protected function rulesValidate()
    {
        $validator = $this->getValidatorInstance();
        if ($validator->fails()) {
            $this->failed($validator);
        }
    }

    public function validate()
    {
        $this->rulesValidate();
        $this->validatePassword();
    }

    protected function validatePassword()
    {
        $auth = \Auth::attempt(['id' => \Auth::id(), 'password' => $this->get('oldPassword')]);

        if (!$auth) {
            $this->failed('原密码不正确');
        }
    }
}
