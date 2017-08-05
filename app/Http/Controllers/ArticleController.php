<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends BaseController
{
    public function show(Article $article)
    {
        $article->increment('view_number');

        return view('article.show', [
            'article' => $article,
            'category' => $article->category,
        ]);
    }
}
