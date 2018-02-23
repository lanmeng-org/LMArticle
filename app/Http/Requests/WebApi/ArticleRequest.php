<?php

namespace App\Http\Requests\WebApi;

use Lanmeng\LMArticle\SeoUtils;

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
            $this->failed($validator->getMessageBag()->first(), 400);
        }
    }

    public function validate()
    {
        $this->rulesValidate();
    }

    public function getParams()
    {
        $data = $this->all();
        $data['position'] = isset($data['position']) ? array_sum($data['position']) : 0;
        $data['content'] = SeoUtils::keywordsReplace($data['content']);
        $data['title'] = SeoUtils::keywordsReplace($data['title']);

        return $data;
    }
}
