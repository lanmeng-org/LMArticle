<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\SettingRepo;
use Lanmeng\LMArticle\SeoUtils;

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

        $articles = $this->getArticles($category);

        $data = compact('articles', 'category')
            + SeoUtils::getSeoArr(
                'category',
                ['{$category.display_name$}'],
                [$category->display_name]
            );

        return view('category.show', $data);
    }

    protected function getArticles(Category $category)
    {
        $categoryIds = [
            $category->getKey(),
        ];
        if (!$category->childCategory->isEmpty()) {
            $categoryIds = array_merge($categoryIds, $category->childCategory->pluck('id')->toArray());
        }

        $articles = Article::orderBy('created_at', 'desc')
            ->whereIn('category_id', $categoryIds)
            ->paginate(setting('article_list_number'));

        return $articles;
    }
}
