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
        $urlType = setting('category_url_type');

        if ($urlType == Category::URL_TYPE_NAME) {
            return url("category/{$category->name}");
        }

        return url("category/{$category->getKey()}");
    }

    public static function getHomeColumnCss(Category $category)
    {
        $css = [
            Category::SHOW_COLUMN_COLOR_DEFAULT => 'default',
            Category::SHOW_COLUMN_COLOR_PRIMARY => 'primary',
            Category::SHOW_COLUMN_COLOR_SUCCESS => 'success',
            Category::SHOW_COLUMN_COLOR_WARNING => 'waring',
        ];

        return $css[$category->show_column_color];
    }
}
