<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends BaseController
{
    public function show(Article $article)
    {
        $article->increment('view_number');
        $data = [
                'article'  => $article,
                'category' => $article->category,
            ] + $this->getSeoArr($article);

        return view('article.show', $data);
    }

    /**
     * Seo 标题 关键词 内容
     */
    protected function getSeoArr(Article $article)
    {
        $arr = [
            'title'       => setting('site_title_article'),
            'key'         => setting('site_key_article'),
            'description' => setting('site_description_article'),
        ];

        $arr =array_map(function ($value) use ($article) {
            return str_replace('{$article.title$}', $article->title, $value);
        }, $arr);

        return $arr;
    }
}
