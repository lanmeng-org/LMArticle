<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends BaseController
{
    public function index()
    {
        $categoryArticles = Category::where('show_home', 1)->orderBy('order')->get();
        $title = str_replace('{$site.name$}', setting('site_name'), setting('site_title_home'));

        return view('home.index', [
            'categoryArticles' => $categoryArticles,
            'title'            => $title,
        ]);
    }
}
