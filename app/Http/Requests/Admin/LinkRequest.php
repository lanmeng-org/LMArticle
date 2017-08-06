<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;

class LinkRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'required',
            'link'  => 'required',
            'order' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'link'  => '链接',
            'order' => '排序',
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
    }
}
