<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepo extends Repository
{
    public function model()
    {
        return Category::class;
    }

    public static function generateUrl(Category $category)
    {
        $urlType = SettingRepo::getItemContent('category_url_type');

        if ($urlType == Category::URL_TYPE_NAME) {
            return url("category/{$category->name}");
        }

        return url("category/{$category->getKey()}");
    }
}
