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

    public static function getList(Category $category, $number = null)
    {
        if (empty($number)) {
            $number = (int)SettingRepo::getItemContent('article_list_number');
        }

        $categoryIds = [
            $category->getKey(),
        ];

        if (!$category->childCategory->isEmpty()) {
            $categoryIds = array_merge($categoryIds, $category->childCategory->pluck('id')->toArray());
        }

        return Article::whereIn('category_id', $categoryIds)->take($number)->get();
    }
}
