<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;

class ArticleRepo extends Repository
{
    public function model()
    {
        return Article::class;
    }

    public static function getList($category = null, $number = null)
    {
        return self::articleQueryForCategory($category)->take($number)->get();
    }

    public static function getHotList($category = null, $number = null)
    {
        return self::articleQueryForCategory($category)
            ->orderBy('view_number', 'desc')
            ->take($number)
            ->get();
    }

    protected static function articleQueryForCategory($category, $number = null)
    {
        if (empty($number)) {
            $number = (int)setting('article_list_number');
        }

        if (!$category instanceof Category) {
            return Article::take($number);
        }

        $categoryIds = [
            $category->getKey(),
        ];

        if (!$category->childCategory->isEmpty()) {
            $categoryIds = array_merge($categoryIds, $category->childCategory->pluck('id')->toArray());
        }

        return Article::whereIn('category_id', $categoryIds)->take($number);
    }
}
