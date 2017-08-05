<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends BaseController
{
    public function index()
    {
        $categoryArticles = Category::where('show_home', 1)->orderBy('order')->get();
        $data = $this->getSeoArr() + ['categoryArticles' => $categoryArticles];

        return view('home.index', $data);
    }

    /**
     * Seo 标题 关键词 内容
     */
    protected function getSeoArr()
    {
        $arr = [
            'title'       => setting('site_title_home'),
            'key'         => setting('site_key_home'),
            'description' => setting('site_description_home'),
        ];

        $arr =array_map(function ($value) {
            return str_replace('{$site.name$}', setting('site_name'), $value);
        }, $arr);

        return $arr;
    }
}
