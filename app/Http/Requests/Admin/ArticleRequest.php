<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;

class ArticleRequest extends Request
{
    public function rules()
    {
        return [
            'title'       => 'required|min:1',
            'category_id' => 'required',
            'content'     => 'required',
            'position'    => 'array',
        ];
    }

    public function attributes()
    {
        return [
            'title'       => '标题',
            'category_id' => '分类',
            'content'     => '内容',
            'position'    => '推荐',
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
