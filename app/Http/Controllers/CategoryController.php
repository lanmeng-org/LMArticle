<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\SettingRepo;

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

        $articleNumber = setting('article_list_number');
        $articles = Article::where('category_id', $category->getKey())->paginate($articleNumber);

        $data = [
            'category' => $category,
            'articles' => $articles,
        ] + $this->getSeoArr($category);

        return view('category.show', $data);
    }

    /**
     * Seo 标题 关键词 内容
     */
    protected function getSeoArr(Category $category)
    {
        $arr = [
            'title'       => setting('site_title_category'),
            'key'         => setting('site_key_category'),
            'description' => setting('site_description_category'),
        ];

        $arr =array_map(function ($value) use ($category) {
            return str_replace(
                [
                    '{$category.display_name$}',
                    '{$site.name$}',
                ],
                [
                    $category->display_name,
                    setting('site_name'),
                ],
                $value
            );
        }, $arr);

        return $arr;
    }
}
