<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Lanmeng\Qiu5\SeoUtils;

class ArticleController extends BaseController
{
    public function show(Article $article)
    {
        $article->increment('view_number');
        $data = [
            'article'  => $article,
            'category' => $article->category,
        ]
        + SeoUtils::getSeoArr(
            'article',
            [
                '{$article.title$}',
                '{$article.keywords$}',
            ],
            [
                $article->title,
                $article->keywords,
            ]
        );

        return view('article.show', $data);
    }
}
