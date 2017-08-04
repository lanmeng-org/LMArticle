<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepo extends Repository
{
    public function model()
    {
        return Article::class;
    }

    public static function getList($number)
    {
        return Article::take($number)->get();
    }
}
