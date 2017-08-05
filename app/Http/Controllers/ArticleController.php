<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends BaseController
{
    public function show(Article $article)
    {
        $article->increment('view_number');
        $title = str_replace('{$article.title$}', $article->title, setting('site_title_article'));

        return view('article.show', [
            'article'  => $article,
            'category' => $article->category,
            'title'    => $title,
        ]);
    }
}
