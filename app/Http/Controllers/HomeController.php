<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends BaseController
{
    public function index()
    {
        $categoryArticles = Category::where('show_home', 1)->orderBy('order')->get();

        return view('home.index', [
            'categoryArticles' => $categoryArticles,
        ]);
    }
}
