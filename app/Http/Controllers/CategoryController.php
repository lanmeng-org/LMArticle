<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\SettingRepo;
use Lanmeng\Qiu5\SeoUtils;

class CategoryController extends BaseController
{
    public function show($category)
    {
        $urlType = setting('category_url_type');

        if ($urlType == Category::URL_TYPE_NAME) {
            $category = Category::where('name', $category)->first();
        } else {
            $category = Category::find($category);
        }

        if (empty($category)) {
            abort(404);
        }

        $articles = Article::orderBy('created_at', 'desc')
            ->where('category_id', $category->getKey())
            ->paginate(setting('article_list_number'));

        $data = compact('articles', 'category')
            + SeoUtils::getSeoArr(
                'category',
                ['{$category.display_name$}'],
                [$category->display_name]
            );

        return view('category.show', $data);
    }
}
