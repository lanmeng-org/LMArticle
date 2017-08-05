<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends BaseController
{
    public function index()
    {
        return view('article.index');
    }

    public function show(Article $article)
    {
        return view('article.show');
    }
}
