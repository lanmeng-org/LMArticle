<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;
use Lanmeng\Qiu5\SeoUtils;

class NoticeRequest extends Request
{
    public function rules()
    {
        return [
            'title'       => 'required|min:1',
            'content'     => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title'       => '标题',
            'content'     => '内容',
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

    public function getParams()
    {
        $data = $this->all();
        $data['content'] = SeoUtils::keywordsReplace($data['content']);
        $data['title'] = SeoUtils::keywordsReplace($data['title']);

        return $data;
    }
}
