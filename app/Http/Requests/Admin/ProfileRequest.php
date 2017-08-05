<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;

class ProfileRequest extends Request
{
    public function rules()
    {
        return [
            'name'     => 'required|min:1',
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name'     => '用户名',
            'email'    => '邮箱',
            'password' => '原密码',
            'newPassword' => '原密码',
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
        $user = \Auth::user();
        $password = $this->get('password');

        \Auth::attempt([
            'email' => $user->email,
            'password' => $password,
        ]);
    }
}
