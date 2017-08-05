<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\ArticleRepo;
use App\Repositories\SettingRepo;

class CategoryController extends BaseController
{
    public function show($category)
    {
        $urlType = SettingRepo::getItemContent('category_url_type');

        if ($urlType == Category::URL_TYPE_NAME) {
            $category = Category::where('name', $category)->first();
        } else {
            $category = Category::find($category);
        }

        if (empty($category)) {
            abort(404);
        }

        $articles = ArticleRepo::getList($category);

        return view('category.show', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
}
